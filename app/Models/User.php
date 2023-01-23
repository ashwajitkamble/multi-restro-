<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Config;
use DB;
use File;
use Hash;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name','last_name','email','password','mobile','store_id','user_img_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\role','role_users');
    }

    // public function stores()
    // {
    //     return $this->belongsToMany('App\Models\store','store_id');
    // }

    public function hasAccess(array $permissions){
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)){
                return true;
            }
        }
        return false;
    }

    public function inRole($roleSlug){
        return $this->roles()->where('slug',$roleSlug)->count() >= 1;
    }

    public function getAllUsers(){
       return User::orderBy('id', 'ASC')->where('status', 1)->with('roles')->paginate(Config::get('constant.datalength'));
    }

    public function getTeacherEmp(){
        return User::join('role_users', 'role_users.user_id', '=', 'users.id')
                    ->where(['role_users.status' => 1,'role_users.role_id' => 1])
                    ->get();
    }

    public function saveProfile(User $user, $data){
        $saveResult = false;
        DB::beginTransaction();
        $userData = User::findOrFail($user->id);
        $user_img = substr($userData->user_img_url, strrpos($userData->user_img_url, '/') + 1);
        if(!empty($data['user_img_url'])){
            File::delete(public_path('images/SystemUsers/'. $user_img)); // Delete previous image from folder
        }
        $data['user_img_url']   = !empty($data['user_img_url']) ? Common::imageUpload($data['user_img_url'], 'SystemUsers') :  $userData->user_img_url;
        $saveResult = User::updateOrCreate(['id' => isset($user->id) ? $user->id : 0], $data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function getUserDetail(User $user){
        $userDetail = false;
        $userDetail = User::where('id', isset($user->id) ? $user->id : 0)->first();
        return $userDetail;
    }

    public function changePassword(User $user, $request){
        $saveResult = false;
        $saveResult = User::where('id', Auth::user()->id)->update(['password' => Hash::make($request['new_password'])]);
        return $saveResult;
    }

    public function saveUser(User $user, $data){
        $saveResult = false;
        $saveResult = User::updateOrCreate(['id' => isset($user->id) ? $user->id : 0], $data);
        return $saveResult;
    }

    public function getStoreName(){
        return !empty(session()->get('store_id')) ? Store::where('status', 1)->where('id', session()->get('store_id'))->select('id','name')->first()-> name : '';
    }
}

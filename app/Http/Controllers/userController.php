<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Services\PayUService\Exception;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use Session;
use Hash;
use Auth;


class userController extends Controller
{
    public $exceptionRoute;
    public $role;
    public $user;
    public $store; 

    public function __construct(Role $role, User $user, Store $store){
        $this->exceptionRoute 	 = 'home';
        $this->role 	         =  $role;
        $this->user 			 =  $user;
        $this->store 			 =  $store;
    }

    public function index(){
        try{
            $users = $this->user->getAllUsers();
            $store = $this->store->getAllStores();
            return view('users.index', compact('users','store'));
        }catch (\Exception $e) {
            return redirect()->route($this->exceptionRoute)->with('warning', $e->getMessage());
        }
    }

    public function add(Request $request){	 
        try{
            $this->user->id = $this->cryptString($request->route()->parameter('id'), "d");
            $user = $this->user->getuserDetail($this->user);
            if($request->isMethod('post')){
                $validator = $this->getValidateUsers($this->user, $request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if($this->user->id == 0){
                    $sucMsg = 'User Successfully Saved !!!';
                    $dangMsg = 'Unable to Save User..! Try Again';
                }else{
                    $sucMsg = 'User Successfully Updated !!!';
                    $dangMsg = 'Unable to Update User..! Try Again';
                }
                $data = $request->only('first_name', 'last_name','email', 'password', 'confirm_password','mobile','store_id','role_id');
                $data['password'] = !empty($request->password) ? Hash::make($request->password) : $user->password;
                $data['is_active']  = !empty($request->is_active) ? true : false;
                if($this->user->id != 0){
                    $this->user->roles()->sync([$request->only('role_id')]);
                    $this->user->stores()->sync([$request->only('store_id')]);
                }
                if($newuser = $this->user->saveUser($this->user, $data)){
                    $newuser->roles()->attach($request->role_id);
                    //$newuser->stores()->attach($request->store_id);
                    Session::flash('success', $sucMsg);
                    return redirect()->route('user');
                }else{
                    Session::flash('danger', $dangMsg);
                }
            }
            $stores = $this->store->getAllStoreList();
            $roles = $this->role->getRolesList();
            return view('users.add', compact('roles', 'user','stores'));
        }catch (\Exception $e) {
            return redirect()->back()->with(['alertclass' => 'alert-warning', 'msg' => $e->getMessage()]);
        }
    }

    public function profile(){
        $user = $this->user->getUserWithId();
        return view('profile.index', compact('user'));
    }

    protected function getValidateUsers(User $user, $data){
        $rules = [
            'first_name'              =>  'required|max:80|regex:/^[a-zA-Z ]*$/',
            'last_name'               =>  'required|max:80|regex:/^[a-zA-Z ]*$/',
            'mobile'                  =>  'required|regex:/^[6-9]\d{9}$/',
            'email'                   =>  'required|email',
            'password'                =>  !empty($user->id) && empty($data['password']) ? '' : 'required|min:6|required_with:confirm_password|same:confirm_password',
            'role_id'                 =>  'required',
            'confirm_password'        =>  !empty($user->id) && empty($data['confirm_password']) ? '' :'required|min:6',
        ];
        $errmsg = [
            'first_name.required'              =>  'first_name is required.',
            'first_name.regex'                 =>  'Please enter only characters.',
            'first_name.max'                   =>  'first_name can be up to 80 characters long.',
            'last_name.required'               =>  'last_name is required.',
            'last_name.regex'                  =>  'Please enter only characters.',
            'last_name.max'                    =>  'last_name can be up to 80 characters long.',
            'mobile.required'                  =>  'Mobile no. is required.',
            'email.required'                   =>  'Email address is required.',
            'email.email'                      =>  'Email address must be a valid email address.',
            'password.required'                =>  'Password is required.',
            'role_id.required'                 =>  'Please select role.',
            'mobile.regex'                     =>  'Please enter valid mobile no.',
            'password.same'                    =>  'Password and confirm password must match.',
            'password.min'                     =>  'Password must be at least 6 characters.',
            'confirm_password.required'        =>  'Confirm password is required.',
            'confirm_password.min'             =>  'Confirm password must be at least 6 characters.'
        ];
        return Validator::make($data, $rules, $errmsg);
    }
}

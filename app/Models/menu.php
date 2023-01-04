<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Config;
use Auth;

class menu extends Model
{
    use HasFactory;
    protected $fillable = ['store_id','category_id','name','prize','description','image','active'];

    public function stores(){
        return $this->belongsTo('App\Models\store', 'store_id');
    }
    public function categories(){
        return $this->belongsTo('App\Models\category', 'category_id');
    }

    public function getAllMenus(){
        return Menu::orderBy('id', 'ASC')->where('status', 1)->with('stores', 'categories')->paginate(Config::get('constant.datalength'));
    }

    public function getAllMenuList(){
        return Menu::where('status',1)->pluck('name', 'id');
    }

    public function saveMenu(Menu $menu, $data){
        $saveResult = false;
        if (!empty($data['image'])) {
            $saveFile = $data['image']->move(public_path('images/products'), $data['image']->getClientOriginalName());
            $data['image']   = !empty($data['image']) ? $data['image']->getClientOriginalName() : $oldImg;
        }
        $saveResult = Menu::updateOrCreate(['id' => isset($menu->id) ? $menu->id : 0], $data);
        return $saveResult;
    }

    public function getMenuDetail(Menu $menu){
        $menuDetail = false;
        $menuDetail = Menu::where('id', isset($menu->id) ? $menu->id : 0)->first();
        return $menuDetail;
    }

}

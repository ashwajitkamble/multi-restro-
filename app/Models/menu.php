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

    public function menuWithMultiID(){
        
        $saveResult = Menu::orderBy('id', 'ASC')->where('status', 1)->paginate(Config::get('constant.datalength'));
        $resultData=[];
        foreach ($saveResult as $key => $value) {
            $store_id    = explode(',', $value->store_id);
            $storeArr=[];
           foreach ($store_id as $store_id) {
             $store = Store:: where('id', $store_id)->first();
             $storeArr[]=[$store_id =>$store->name];
           }
            $category = Category:: where('id', $value->category_id)->first();
          $value['stores'] = $storeArr;
          $resultData[]=[
            'id'            => $value->id,
            'store_id'      => $value->store_id,
            'category_id'   => $value->category_id,
            'name'          => $value->name,
            'prize'         => $value->prize,
            'description'   => $value->description,
            'image'         => asset('public/images/products/'). '/' .$value->image,
            'active'        => $value->active,
            'stores'        => $value->stores,
            'categories'    => $category->name,
          ];
        }
        return $resultData;
    }

}

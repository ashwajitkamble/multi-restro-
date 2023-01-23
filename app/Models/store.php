<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Config;
use Auth;

class store extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    public function getAllStores(){
        return Store::orderBy('id', 'ASC')->where('status', 1)->paginate(Config::get('constant.datalength'));
    }

    public function getAllStoreList(){
        return Store::where('status',1)->pluck('name', 'id');
    }

    public function saveStore(Store $store, $data){
        $saveResult = false;
        if (!empty($data['image'])) {
            $saveFile = $data['image']->move(public_path('images/stores'), $data['image']->getClientOriginalName());
            $data['image']   = !empty($data['image']) ? $data['image']->getClientOriginalName() : $oldImg;
        }
        $saveResult = Store::updateOrCreate(['id' => isset($store->id) ? $store->id : 0], $data);
        return $saveResult;
    }

    public function getStoreDetail(Store $store){
        $storeDetail = false;
        $storeDetail = Store::where('id', isset($store->id) ? $store->id : 0)->first();
        return $storeDetail;
    }
}

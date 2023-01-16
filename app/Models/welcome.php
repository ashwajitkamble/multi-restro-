<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use QrCode;

class welcome extends Model
{
    use HasFactory;

    public function tableDetail(){
        $storeArr = [];
        $store = Store::orderBy('id', 'ASC')->where('status', 1)->get();
        foreach ($store as $key => $store) {
            $tableArr = [];
            $table = Table::orderBy('id', 'ASC')->where(['store_id' => $store->id , 'availability' => 1],'status', 1)->get();
            foreach ($table as $key => $table) {
                $tableArr[] = [
                    'name' => $table->name,
                    'capacity' => $table->capacity,
                    'qr-code' => QrCode::format('png')->generate(route('welcome')),
                ];
            }
            $storeArr[] = [
                'store' => $store->name,
                'tables' => $tableArr,
            ];
        }
        return $storeArr;
    }
    public function menuDetail(){
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();       
        $catArr  = [];
        foreach ($category as $key => $category) {
            $menuArr= [];
            $menu = Menu::orderBy('id', 'ASC')->where([ 'category_id' => $category->id, 'active' => 1],'status', 1)->get();
            foreach ($menu as $key => $menu) {
                $menuArr[$menu->id]= [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'prize' => $menu->prize,
                    'description' => $menu->description,
                    'image' => asset('public/images/products/'). '/' .$menu->image,
                ];
            }
            $catArr[$category->id]  = [
                'id' => $category->id,
                'name' => $category->name,
                'menu' => $menuArr,
            ]; 
        }
        return $catArr ;      
    }
}

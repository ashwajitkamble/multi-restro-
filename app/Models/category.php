<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Config;
use Auth;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function getAllCategories(){
        return Category::orderBy('id', 'ASC')->where('status', 1)->paginate(Config::get('constant.datalength'));
    }

    public function getAllCategoryList(){
        return Category::where('status',1)->pluck('name', 'id');
    }

    public function saveCategory(Category $category, $data){
        $saveResult = false;
        $saveResult = Category::updateOrCreate(['id' => isset($category->id) ? $category->id : 0], $data);
        return $saveResult;
    }

    public function getCategoryDetail(Category $category){
        $categoryDetail = false;
        $categoryDetail = Category::where('id', isset($category->id) ? $category->id : 0)->first();
        return $categoryDetail;
    }
}

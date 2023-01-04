<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUService\Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public $exceptionRoute;
    public $Category;

    public function __construct(Category $category){
        $this->middleware('auth');
        $this->exceptionRoute    = 'home';
        $this->category          = $category;
    }

    public function index(){
        try{
            $categories = $this->category->getAllCategories();
            return view('categories.index', compact('categories'));
        }catch (\Exception $e) {
            return redirect()->route($this->exceptionRoute)->with('warning', $e->getMessage());
        }
    }

    public function add(Request $request){
        try{
            
            $this->category->id = $request->route()->parameter('id');
            if(!empty($this->category->id)){
                $sucMsg  = 'Category Successfully Updated !!!';
                $dangMsg = 'Unable to Updated Category..! Try Again';
            }else{
                $sucMsg  = 'Category Successfully Created !!!';
                $dangMsg = 'Unable to Saved Category..! Try Again';
            }
            if($request->isMethod('post')){
                $validator = $this->getValidateCategory($this->category, $request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data = $request->only('name');
                if($this->category->saveCategory($this->category, $data)){
                    Session::flash('success', $sucMsg);
                    return redirect()->route('category');
                }else{
                    Session::flash('danger', $dangMsg);
                }
            }
            $category = $this->category->getCategoryDetail($this->category);
            return view('categories.add', compact('category'));
        }catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }
    }

    protected function getValidateCategory(Category $category, $data){
        $rules = [
            'name' => ['required',
                Rule::unique($category->getTable())->ignore($category->id)->where(function($query) {
                $query->where('status', 1);
                }),
            ]
        ];
        $errmsg = [
            'name.required' => 'Category name is required.',
            'name.unique'   => 'Category name has been already taken.'
        ];
        return Validator::make($data, $rules, $errmsg);
    }
}

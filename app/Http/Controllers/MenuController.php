<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUService\Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use App\Models\Menu;
use Session;


class MenuController extends Controller
{
    public $exceptionRoute;
    public $menu;
    public $category;
    public $store;

    public function __construct(Menu $menu, Store $store, Category $category){
        $this->middleware('auth');
        $this->exceptionRoute    = 'home';
        $this->menu              = $menu;
        $this->store             = $store;
        $this->category          = $category;
    }

    public function index(){
        try{
            $menus = $this->menu->menuWithMultiID();
            $categories = $this->category->getAllCategories();
            $stores = $this->store->getAllStores();
            return view('menus.index', compact('menus', 'categories','stores'));
        }catch (\Exception $e) {
            return redirect()->route($this->exceptionRoute)->with('warning', $e->getMessage());
        }
    }

    public function add(Request $request){
        try{
            
            $this->menu->id = $request->route()->parameter('id');
            if(!empty($this->menu->id)){
                $sucMsg  = 'Menu Successfully Updated !!!';
                $dangMsg = 'Unable to Updated Menu..! Try Again';
            }else{
                $sucMsg  = 'Menu Successfully Created !!!';
                $dangMsg = 'Unable to Saved Menu..! Try Again';
            }
            if($request->isMethod('post')){
                $validator = $this->getValidateMenu($this->menu, $request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data = $request->only('store_id','category_id','name','prize','description','image','active');
                $data['store_id'] = implode(',', $data['store_id']);
                if($this->menu->saveMenu($this->menu, $data)){
                    Session::flash('success', $sucMsg);
                    return redirect()->route('menu');
                }else{
                    Session::flash('danger', $dangMsg);
                }
            }
            $stores = $this->store->getAllStores();
            $categories = $this->category->getAllCategories();
            $menus = $this->menu->getMenuDetail($this->menu);
            return view('menus.add', compact('menus','stores', 'categories'));
        }catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }
    }

    protected function getValidateMenu(Menu $menu, $data){
        $rules = [
            'name' => ['required',
                Rule::unique($menu->getTable())->ignore($menu->id)->where(function($query) {
                $query->where('status', 1);
                }),
            ],
            'prize' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' =>'required|max:255',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ];
            
        $errmsg = [
            'name.required' => 'Menu name is required.',
            'name.unique'   => 'Menu name has been already taken.',
            'description.required' => 'Menu description is required.',
            'description.max' => 'Menu description is too long.',
            'image.required' => 'Menu image is required.',
            'image.mimes' => 'Menu image must be an image.',
            'prize.required' => 'Price required.',
            'prize.regex' => 'Price must be a number.',
        ];  
        return Validator::make($data, $rules, $errmsg);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUService\Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Store;
use Session;

class StoreController extends Controller
{
    public $exceptionRoute;
    public $store;

    public function __construct(Store $store){
        $this->middleware('auth');
        $this->exceptionRoute    = 'home';
        $this->store             = $store;
    }

    public function index(){
        try{
            $stores = $this->store->getAllStores();
            return view('stores.index', compact('stores'));
        }catch (\Exception $e) {
            return redirect()->route($this->exceptionRoute)->with('warning', $e->getMessage());
        }
    }

    public function add(Request $request){
        try{
            
            $this->store->id = $request->route()->parameter('id');
            if(!empty($this->store->id)){
                $sucMsg  = 'Store Successfully Updated !!!';
                $dangMsg = 'Unable to Updated Store..! Try Again';
            }else{
                $sucMsg  = 'Store Successfully Created !!!';
                $dangMsg = 'Unable to Saved Store..! Try Again';
            }
            if($request->isMethod('post')){
                $validator = $this->getValidateStore($this->store, $request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data = $request->only('name');
                if($this->store->saveStore($this->store, $data)){
                    Session::flash('success', $sucMsg);
                    return redirect()->route('store');
                }else{
                    Session::flash('danger', $dangMsg);
                }
            }
            $store = $this->store->getStoreDetail($this->store);
            return view('stores.add', compact('store'));
        }catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }
    }

    protected function getValidateStore(Store $store, $data){
        $rules = [
            'name' => ['required',
                Rule::unique($store->getTable())->ignore($store->id)->where(function($query) {
                $query->where('status', 1);
                }),
            ]
        ];
        $errmsg = [
            'name.required' => 'Store name is required.',
            'name.unique'   => 'Store name has been already taken.'
        ];
        return Validator::make($data, $rules, $errmsg);
    }
}

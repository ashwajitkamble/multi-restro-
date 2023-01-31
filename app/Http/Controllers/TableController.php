<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUService\Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\table;
use App\Models\store;
use Session;

class TableController extends Controller
{
    public $exceptionRoute;
    public $table;
    public $store;

    public function __construct(table $table, store $store){
        $this->middleware('auth');
        $this->exceptionRoute    = 'home';
        $this->table             = $table;
        $this->store             = $store;
    }

    public function index(){
        try{
            $tables = $this->table->getAllTables();
            $stores = $this->store->getAllStores();
            return view('tables.index', compact('tables', 'stores'));
        }catch (\Exception $e) {
            return redirect()->route($this->exceptionRoute)->with('warning', $e->getMessage());
        }
    }

    public function add(Request $request){
        //try{
            
            $this->table->id = $request->route()->parameter('id');
            if(!empty($this->table->id)){
                $sucMsg  = 'Table Successfully Updated !!!';
                $dangMsg = 'Unable to Updated Table..! Try Again';
            }else{
                $sucMsg  = 'Table Successfully Created !!!';
                $dangMsg = 'Unable to Saved Table..! Try Again';
            }
            if($request->isMethod('post')){
                $validator = $this->getValidateTable($this->table, $request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data = $request->only('name', 'store_id','capacity', 'availability' );
                if($this->table->saveTable($this->table, $data)){
                    Session::flash('success', $sucMsg);
                    return redirect()->route('table');
                }else{
                    Session::flash('danger', $dangMsg);
                }
            }
            $stores = $this->store->getAllStores();
            $table = $this->table->getTableDetail($this->table);
            return view('tables.add', compact('table','stores'));
        // }catch (\Exception $e) {
        //     return redirect()->back()->with('warning', $e->getMessage());
        // }
    }

    protected function getValidateTable(Table $table, $data){
        $rules = [
            'name' => ['required',
                Rule::unique($table->getTable())->ignore($table->id)->where(function($query) {
                $query->where('status', 1);
                }),
            ]
        ];
        $errmsg = [
            'name.required' => 'Table name is required.',
            'name.unique'   => 'Table name has been already taken.'
        ];
        return Validator::make($data, $rules, $errmsg);
    }

}

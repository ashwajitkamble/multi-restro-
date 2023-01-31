<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUService\Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Welcome;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Store;

use Session;
use QrCode;


class WelcomeController extends Controller
{
    public $menu;
    public $category;
    public $table;
    public $store;
    public $welcome;

    public function __construct(Welcome $welcome, Menu $menu, Table $table, Store $store, Category $category){
        $this->menu              = $menu;
        $this->store             = $store;
        $this->welcome           = $welcome;
        $this->table             = $table;
        $this->category          = $category;
    }

    public function index(){
        $category = $this->welcome->menuDetail();
        $store = $this->welcome->tableDetail();
        $show = view('welcome', compact('category','store'));
        return $show ;
    }

    public function qrCode(){
        $store = $this->welcome->tableDetail();        
        return view('qrCode', compact('store'));
        
    }
}

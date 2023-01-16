<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUService\Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Store;
use App\Models\Welcome;

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
        return  view('welcome', compact('category'));
        
    }
    public function qrCode(){
        $store = $this->welcome->tableDetail();
        return  view('qrCode', compact('store'));
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUService\Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Models\category;
use App\Models\welcome;
use App\Models\table;
use App\Models\menu;
use App\Models\store;

use Session;



class WelcomeController extends Controller
{
    public $menu;
    public $category;
    public $table;
    public $store;
    public $welcome;

    public function __construct(welcome $welcome, menu $menu, table $table, store $store, category $category){
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

}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'web'], function () {
    // Softdelete table row
    Route::get('/dashboard/{id}/{model}',[App\Http\Controllers\Controller::class, 'delete'])->name('delete.submit');
    // Dashboard route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Store routes
    Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store');
    Route::get('/store-add', [App\Http\Controllers\StoreController::class, 'add'])->name('store-add');
    Route::match(['get', 'post'], '/store-edit/{id?}',[App\Http\Controllers\StoreController::class, 'add'] )->name('store-edit');

    //Category routes
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/category-add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category-add');
    Route::match(['get', 'post'], '/category-edit/{id?}',[App\Http\Controllers\CategoryController::class, 'add'] )->name('category-edit');


    //Table routes
    Route::get('/table', [App\Http\Controllers\TableController::class, 'index'])->name('table');
    Route::get('/table-add', [App\Http\Controllers\TableController::class, 'add'])->name('table-add');
    Route::match(['get', 'post'], '/table-edit/{id?}',[App\Http\Controllers\TableController::class, 'add'] )->name('table-edit');

    //Menu routes
    Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
    Route::get('/menu-add', [App\Http\Controllers\MenuController::class, 'add'])->name('menu-add');
    Route::match(['get', 'post'], '/menu-edit/{id?}',[App\Http\Controllers\MenuController::class, 'add'] )->name('menu-edit');

    //User route
    Route::get('/user', [App\Http\Controllers\userController::class, 'index'])->name('user');
    Route::get('/user-add',  [App\Http\Controllers\userController::class, 'add'])->name('user-add');
    Route::match(['get', 'post'], '/user-edit/{id?}',  [App\Http\Controllers\userController::class, 'add'])->name('user-edit');

    //Role route
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');
    Route::get('/role-add', [App\Http\Controllers\RoleController::class, 'add'])->name('role-add');
    Route::match(['get', 'post'], '/role-edit/{id?}', [App\Http\Controllers\RoleController::class, 'add'])->name('role-edit');

});

Route::get('/test', function(){
    return view('stores.add');
});

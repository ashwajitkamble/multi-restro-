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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'qrCode'] )->name('qrCode');
Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'] )->name('welcome');

Auth::routes();
Route::group(['middleware' => 'web'], function () {
    // Softdelete table row
    Route::get('/dashboard/{id}/{model}',[App\Http\Controllers\Controller::class, 'delete'])->name('delete.submit');
    // Dashboard route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Store routes
    Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store')->middleware('can:store');
    Route::get('/store-add', [App\Http\Controllers\StoreController::class, 'add'])->name('store-add')->middleware('can:store-add');
    Route::match(['get', 'post'], '/store-edit/{id?}',[App\Http\Controllers\StoreController::class, 'add'] )->name('store-edit')->middleware('can:store-edit');

    //Category routes
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category')->middleware('can:category');
    Route::get('/category-add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category-add')->middleware('can:category-add');
    Route::match(['get', 'post'], '/category-edit/{id?}',[App\Http\Controllers\CategoryController::class, 'add'] )->name('category-edit')->middleware('can:category-edit');

    //Table routes
    Route::get('/table', [App\Http\Controllers\TableController::class, 'index'])->name('table')->middleware('can:table');
    Route::get('/table-add', [App\Http\Controllers\TableController::class, 'add'])->name('table-add')->middleware('can:table-add');
    Route::match(['get', 'post'], '/table-edit/{id?}',[App\Http\Controllers\TableController::class, 'add'] )->name('table-edit')->middleware('can:table-edit');

    //Menu routes
    Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu')->middleware('can:menu');
    Route::get('/menu-add', [App\Http\Controllers\MenuController::class, 'add'])->name('menu-add')->middleware('can:menu-add');
    Route::match(['get', 'post'], '/menu-edit/{id?}',[App\Http\Controllers\MenuController::class, 'add'] )->name('menu-edit')->middleware('can:menu-edit');

    //User route
    Route::get('/user', [App\Http\Controllers\userController::class, 'index'])->name('user')->middleware('can:user');
    Route::get('/user-add',  [App\Http\Controllers\userController::class, 'add'])->name('user-add')->middleware('can:user-add');
    Route::match(['get', 'post'], '/user-edit/{id?}',  [App\Http\Controllers\userController::class, 'add'])->name('user-edit')->middleware('can:user-edit');

    //Role route
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role')->middleware('can:role');
    Route::get('/role-add', [App\Http\Controllers\RoleController::class, 'add'])->name('role-add')->middleware('can:role-add');
    Route::match(['get', 'post'], '/role-edit/{id?}', [App\Http\Controllers\RoleController::class, 'add'])->name('role-edit')->middleware('can:role-edit');

    //profile
    Route::get('/profile', [App\Http\Controllers\userController::class, 'profile'])->name('profile');
});

Route::get('/test', function(){
    return view('stores.add');
});

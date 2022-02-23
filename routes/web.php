<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\RestaurantsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OrderstatusController;
use App\Http\Controllers\admin\FavouriteController;
use App\Http\Controllers\admin\VendoreRestaurantsController;
use App\Http\Controllers\admin\MenuItemController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\front\FrontController;
use App\Http\Middleware\AdminAuth;


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

Route::get('/',[FrontController::class,'index']);
Route::get('details/{id}',[FrontController::class,'details']);
Route::get('add_to_cart_check',[FrontController::class,'add_to_cart_check']);
Route::get('help',[FrontController::class,'help']);
Route::get('offer',[FrontController::class,'offer']);
Route::get('cart',[FrontController::class,'cart']);
Route::get('search',[FrontController::class,'search']);
Route::get('registrashion',[FrontController::class,'registrashion']);


Route::post('add_qty',[FrontController::class,'add_qty'])->name('add_qty');
Route::post('remove_qty',[FrontController::class,'remove_qty'])->name('remove_qty');
Route::post('checkout',[FrontController::class,'checkout'])->name('checkout');


Route::post('removeadd_to_cart',[FrontController::class,'removeadd_to_cart'])->name('removeadd_to_cart');
Route::post('ordered',[FrontController::class,'ordered'])->name('ordered');
Route::post('removefavourite',[FrontController::class,'removefavourite'])->name('removefavourite');
Route::post('favourite',[FrontController::class,'favourite'])->name('favourite');
Route::get('readRestaurant',[FrontController::class,'readRestaurant']);
Route::post('add_to_cart',[FrontController::class,'add_to_cart'])->name('add_to_cart');
Route::post('register',[FrontController::class,'register'])->name('register');

Route::post('name',[FrontController::class,'name'])->name('name');
Route::post('user_login',[FrontController::class,'user_login'])->name('user_login');
Route::get('login',[FrontController::class,'login']);
Route::get('user/logout', function () {
    session()->forget('USER_ID');
    session()->forget('USER_NAME');
    
    session()->flash('error','logout sucessfully');
    
    return redirect('admin');
});
Route::get('user/logout',[FrontController::class,'logout']);










Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){    

    Route::get('vendore/menu_Items',[MenuController::class,'index']);
    Route::get('vendore/add/menu_details',[MenuController::class,'add_blade']);
    Route::post('vendore/add_menu_details',[MenuController::class,'add_menu_details'])->name('vendore.add_menu_details');
    Route::post('vendore/update_menu_details',[MenuController::class,'update_menu_details'])->name('vendore.update_menu_details');
    Route::get('vendore/menuitemdetails/deactive/{id}',[MenuController::class,'deactive']);
    Route::get('vendore/menuitemdetails/active/{id}',[MenuController::class,'active']);
    Route::get('vendore/menuitemdetails/delete/{id}',[MenuController::class,'delete']);
    Route::get('vendore/menuitemdetails/edit/{id}',[MenuController::class,'edit']);






    Route::get('vendore/menu_title',[MenuItemController::class,'index']);
    Route::get('vendore/add/menu',[MenuItemController::class,'add_menu']);
    Route::post('vendore/add_title',[MenuItemController::class,'add_title'])->name('vendore.add_title');
    Route::get('vendore/menuitem/deactive/{id}',[MenuItemController::class,'deactive']);
    Route::get('vendore/menuitem/active/{id}',[MenuItemController::class,'active']);
    Route::get('vendore/menuitem/delete/{id}',[MenuItemController::class,'delete']);
    Route::get('vendore/menuitem/edit/{id}',[MenuItemController::class,'edit']);
    Route::post('vendore/update_title',[MenuItemController::class,'update_title'])->name('vendore.update_title');
    
    Route::get('vendore/restaurants',[VendoreRestaurantsController::class,'index']);
    Route::get('vendore/update/password/{id}',[VendoreRestaurantsController::class,'update_password']);
    Route::get('vendore/change_password/{id}',[VendoreRestaurantsController::class,'change_password']);
    Route::post('vendore/update/restaurants_details',[VendoreRestaurantsController::class,'update'])->name('vendore.update.restaurants');
    Route::post('vendore/update/password',[VendoreRestaurantsController::class,'update_old_password'])->name('update.restaurants.password');


    


    Route::get('admin/user',[UserController::class,'index']);
    Route::get('admin/user/active/{id}',[UserController::class,'active']);
    Route::get('admin/user/deactive/{id}',[UserController::class,'deactive']);
    Route::get('admin/user/delete/{id}',[UserController::class,'delete']);
    Route::get('admin/user',[UserController::class,'index']);
    Route::get('admin/order',[OrderController::class,'index']);
    Route::get('admin/favourite',[FavouriteController::class,'index']);
    Route::get('admin/add_status',[OrderstatusController::class,'add']);
    Route::get('admin/order_status',[OrderstatusController::class,'index']);
    Route::get('admin/status/deactive/{id}',[OrderstatusController::class,'deactive']);
    Route::get('admin/status/active/{id}',[OrderstatusController::class,'active']);
    Route::get('admin/status/delete/{id}',[OrderstatusController::class,'delete']);
    Route::get('admin/status/edit/{id}',[OrderstatusController::class,'edit']);
    Route::post('admin/add/status',[OrderstatusController::class,'add_status'])->name('admin.add_status');
    Route::post('admin/edit/status',[OrderstatusController::class,'edit_status'])->name('admin.edit_status');
    Route::get('admin/add_restaurants',[RestaurantsController::class,'add']);
    Route::get('admin/restaurants',[RestaurantsController::class,'index']);
    Route::get('add/details/{id}',[RestaurantsController::class,'add_details']);
    Route::get('admin/restaurants/delete/{id}',[RestaurantsController::class,'delete']);
    Route::get('admin/restaurants/deactive/{id}',[RestaurantsController::class,'deactive']);
    Route::get('admin/restaurants/active/{id}',[RestaurantsController::class,'active']);
    Route::post('admin/add/details',[RestaurantsController::class,'resta_details'])->name('add.restaurants');
    Route::post('admin/restaurants',[RestaurantsController::class,'add_restaurants'])->name('admin.restaurants');
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('VANDORE_LOGIN');
        session()->forget('VANDORE_NAME');
        
        session()->flash('error','logout sucessfully');
        
        return redirect('admin');
    });
    
});

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
    return view('website/index');
});
Route::get('/contact', function () {
    return view('website/contact');
});
Route::get('/category', function () {
    return view('website/category');
});
Route::get('/maincategory', function () {
    return view('website/mainCategory');
});

Route::view('admin/dashboard', 'admin.dashboard');
Route::view('admin/userdashboard', 'admin.userdashboard');
Route::view('user/users', 'admin.user.users');
Route::view('admin/users', 'admin.users');
Route::view('admin/setup/index', 'admin.setup.index');
Route::view('admin/addproduct/index', 'admin.add_product.index');
Route::view('admin/addproduct/products', 'admin.add_product.products');
Route::view('admin/addproduct/discount', 'admin.add_product.adddiscount');
Route::view('admin/order/orderdetails', 'admin.order.orderdetails');
Route::view('admin/order/shippingdetails', 'admin.order.shippingDetails');
Route::view('admin/banner/bannerimage', 'admin.banner_image.bannerimage');
Route::view('admin/cart/allusercartdetails', 'admin.cart.allusercartdetails');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

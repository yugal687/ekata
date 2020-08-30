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

/*login*/
Route::get('/userlogin', function () {
    return view('website/userlogin');
});

Route::get('/', 'Website\ProductController@index');

Route::get('/billings', function () {
    return view('website/billings');
});

Route::get('/contact', function () {
    return view('website/contact');
});
Route::get('/category','Website\ProductController@showCategory');
Route::get('/maincategory/{id}', [
    "uses" => 'Website\ProductController@showMainCategory',
    "as" => 'maincategory']);

Route::get('/singleproduct','Website\ProductController@SingleProductPage');

Route::view('admin/dashboard', 'admin.dashboard');
Route::view('user/users', 'admin.user.users');
Route::view('customer/customers', 'admin.customer.customers');
/*Route::view('admin/users', 'admin.users');*/
Route::view('admin/userregistration', 'admin.userregistration');
Route::view('admin/usersignin', 'admin.usersignin');
//Setup.....
Route::view('admin/setup/index', 'admin.setup.index');
Route::view('admin/setup/brands', 'admin.setup.brands');
Route::view('admin/setup/tags', 'admin.setup.tags');
//Product
Route::view('admin/addproduct/index', 'admin.add_product.index');
Route::view('admin/addproduct/products', 'admin.add_product.products');
Route::view('admin/addproduct/discount', 'admin.add_product.adddiscount');
//Order
Route::view('admin/order/orderdetails', 'admin.order.orderdetails');
//Banner Image
Route::view('admin/banner/bannerimage', 'admin.banner_image.bannerimage');
Route::view('admin/cart/allusercartdetails', 'admin.cart.allusercartdetails');

//User Dashboard
Route::view('userdashboard/userdashboard', 'user dashboard.userdashboard');
Route::view('userdashboard/userprofile', 'user dashboard.userprofile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});



Route::get('/', function () {
    return view('website/index');
});


Route::get('/billings', function () {
    return view('website/billings');
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
Route::get('/singleproduct', function () {
    return view('website/singleProduct');
});

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
Route::view('admin/order/orderdetails', 'admin.order.orderdetails');
Route::view('admin/order/shippingdetails', 'admin.order.shippingDetails');
Route::view('admin/banner/bannerimage', 'admin.banner_image.bannerimage');
Route::view('admin/cart/allusercartdetails', 'admin.cart.allusercartdetails');
Route::group(['middleware' => ['auth', 'admin']], function () {
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

//User Dashboard
Route::view('userdashboard/userdashboard', 'user dashboard.userdashboard');
Route::view('userdashboard/userprofile', 'user dashboard.userprofile');

Auth::routes();
});


Route::get('/billings', function () {
    return view('website/billings');
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
Route::get('/singleproduct', function () {
    return view('website/singleProduct');
});


Route::get('/', function () {
    return view('website/index');
});

Route::get('/home', 'HomeController@index')->name('home');

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


Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});

Route::get('/category/{id}',[
    "uses" => 'Website\ProductController@showCategory',
    "as" => 'category']);
Route::get('/aboutus', function () {
    return view('website/aboutus');
});
/*Route::get('/products', function () {
    return view('website/products');
});*/
Route::get('/products','Website\ProductController@showProducts');
Route::get('/maincategory/{id}', [
    "uses" => 'Website\ProductController@showMainCategory',
    "as" => 'maincategory']);

Route::get('/singleproduct/{id}',[
    'uses' => 'Website\ProductController@SingleProductPage',
    'as' => 'singleproduct']);
Route::group(['middleware' => ['auth', 'admin']], function () {
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
//Website Info
Route::view('admin/websiteupdate/websiteinfo', 'admin.website_update.websiteInfo');
Route::view('admin/websiteupdate/enquiries', 'admin.website_update.enquiries');
    Route::view('admin/order/shippingdetails', 'admin.order.shippingDetails');
    Route::view('admin/cart/allusercartdetails', 'admin.cart.allusercartdetails');

});

//User
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::view('user/userdashboard', 'User.userdashboard');
    Route::get('user/userprofile', [
      "uses" => 'User\UserController@singleUserDetail',
        "as" => 'user/userdashboard'
    ]);
    Route::post('/updateUser/{id}',[
        "uses" => 'User\UserController@updateUser',
        "as" => 'updateUser'
    ]);
});


Auth::routes();


Route::get('/billings', function () {
    return view('website/billings');
});

Route::get('/contact','Website\WebsiteDetailController@showDetails');


Route::get('/','Website\ProductController@index');

Route::get('/home', 'HomeController@index')->name('home');

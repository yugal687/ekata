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


Route::view('/adminregister', 'auth.adminregistration');
/*Route::view('/usersignin', 'admin.usersignin');*/


Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});

Route::get('/aboutus', function () {
    return view('website/aboutus');
});
Route::get('/services', 'Website\ProductController@service');
/*Route::get('/products', function () {
    return view('website/products');
});*/
Route::get('/products','Website\ProductController@showProducts');
Route::get('/category/{id}', [
    "uses" => 'Website\ProductController@showCategory',
    "as" => 'category']);
Route::get('/maincategory/{id}', [
    "uses" => 'Website\ProductController@showMainCategory',
    "as" => 'maincategory']);

Route::get('/singleproduct/{id}', [
    'uses' => 'Website\ProductController@SingleProductPage',
    'as' => 'singleproduct']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin/dashboard', 'Admin\DashboardController@dashboradData');
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
Route::view('admin/websiteupdate/customersfeedback', 'admin.website_update.customersFeedback');
Route::view('admin/websiteupdate/reviewscarousel', 'admin.website_update.reviewsCarousel');
//Services
Route::view('admin/services/', 'admin.services.service');

    Route::view('admin/order/shippingdetails', 'admin.order.shippingDetails');
    Route::view('admin/cart/allusercartdetails', 'admin.cart.allusercartdetails');

});
//Services
Route::view('admin/services/', 'admin.services.service');


//User
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('user/userdashboard', 'User\UserController@recentOrder');
    Route::view('user/userprofile','User.userprofile');
});


Auth::routes();


Route::get('/billings', function () {
    return view('website/billings');
});
    Route::view('admin/addproduct/index', 'admin.add_product.index');
    Route::view('admin/addproduct/products', 'admin.add_product.products');
    Route::view('admin/addproduct/discount', 'admin.add_product.adddiscount');
//Order
    Route::view('admin/order/orderdetails', 'admin.order.orderdetails');
//Banner Image
    Route::view('admin/banner/bannerimage', 'admin.banner_image.bannerimage');
//Website Info
    Route::view('admin/websiteupdate/websiteinfo', 'admin.website_update.websiteInfo');

//User
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::view('user/userdashboard', 'User.userdashboard');
    Route::get('user/userprofile', [
        "uses" => 'User\UserController@singleUserDetail',
        "as" => 'user/userdashboard'
    ]);
    Route::post('/updateUser/{id}', [
        "uses" => 'User\UserController@updateUser',
        "as" => 'updateUser'
    ]);
    Route::get('/billings', function () {
        //make controller and paste the function
        if (!Auth::user()) {
            redirect('/login');
        }
        return view('website/billings');
    });

Route::get('/contact','Website\WebsiteDetailController@showDetails');
    Route::group(['prefix' => 'paypal'], function () {
        Route::get('sucess', function () {
            dd('success');
        })->name('payment.success');
        Route::get('cancel', function () {
            dd('cancel');
        })->name('payment.cancel');

    });


});
Auth::routes();

Route::get('/', 'Website\ProductController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/saveEnquiry','Website\EnquiryController@saveEnquiry');

Route::post('/saveFeedback','Website\FeedbackController@saveFeedback');

Route::post('/registerUser','User\UserController@registeruser');
Route::post('/registerAdmin','User\UserController@registerAdmin');

//Testing Route



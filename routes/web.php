<?php

use App\Mail\OrderMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

//Register Route


//

/*Route::view('/usersignin', 'admin.usersignin');*/
Route::post('/registerUser', 'User\UserController@registerUser');
Route::post('/registerAdmin', 'User\UserController@registerAdmin');

//Logout
Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});
//About Us
Route::get('/aboutus', 'Website\WebsiteDetailController@aboutUs');
//Services
Route::get('/services', 'Website\ProductController@service');
Route::get('/servicedetails/{id}',
    ["uses"=>'Website\ProductController@serviceDetails',
"as" =>'servicedetails']);
/*Route::get('/products', function () {
    return view('website/products');
});*/
//Product Page Url
Route::post('/searchedproducts', [
    "uses"=>'Website\ProductController@showProducts',
    "as"=>'searchedproducts']);
Route::get('/products', [
    "uses"=>'Website\ProductController@showProducts',
"as"=>'products']);
//Sub Category Page Url
Route::get('/category/{id}', [
    "uses" => 'Website\ProductController@showCategory',
    "as" => 'category']);
//Category Page Url
Route::get('/maincategory/{id}', [
    "uses" => 'Website\ProductController@showMainCategory',
    "as" => 'maincategory']);
//SingleProduct Page Url
Route::get('/singleproduct/{id}', [
    'uses' => 'Website\ProductController@SingleProductPage',
    'as' => 'singleproduct']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::view('/adminregister', 'auth.adminregistration');
    Route::view('admin/services/', 'Admin.Services.service');
    Route::get('/allAdmins', 'Admin\DashboardController@fetchAdmin');
    Route::get('admin/dashboard', 'Admin\DashboardController@dashboradData');
    Route::view('user/users', 'Admin.User.users');
    Route::view('customer/customers', 'Admin.Customer.customers');
    /*Route::view('admin/users', 'admin.users');*/
    Route::view('admin/userregistration', 'admin.userregistration');
    Route::view('admin/usersignin', 'admin.usersignin');
//Setup.....
    Route::view('admin/setup/index', 'Admin.Setup.index');
    Route::view('admin/setup/brands', 'Admin.Setup.brands');
    Route::view('admin/setup/tags', 'Admin.Setup.tags');
//Product
    Route::view('admin/addproduct/index', 'Admin.Add_Product.index');
    Route::view('admin/addproduct/products', 'Admin.Add_Product.products');
    Route::view('admin/addproduct/discount', 'Admin.Add_Product.adddiscount');
//Order
    Route::view('admin/order/orderdetails', 'Admin.Order.orderdetails');
//Banner Image
    Route::view('admin/banner/bannerimage', 'Admin.Banner_Image.bannerimage');
//Website Info
    Route::view('admin/websiteupdate/websiteinfo', 'Admin.Website_Update.websiteInfo');
    Route::view('admin/websiteupdate/enquiries', 'Admin.Website_Update.enquiries');
    Route::view('admin/websiteupdate/customersfeedback', 'Admin.Website_Update.customersFeedback');
    Route::view('admin/websiteupdate/reviewscarousel', 'Admin.Website_Update.reviewsCarousel');
//Services
    Route::view('admin/services/', 'Admin.Services.service');

    Route::view('admin/order/shippingdetails', 'Admin.Order.shippingDetails');
    Route::view('admin/cart/allusercartdetails', 'Admin.Cart.allusercartdetails');

});
//Services


Auth::routes();


//User Routes
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('user/userdashboard', 'User\UserController@dashboradData');
    Route::view('user/userprofile', 'User.userprofile');


    Route::get('/billings', function () {
        //make controller and paste the function
        if (!Auth::user()) {
            redirect('/login');
        }
        return App::call('App\Http\Controllers\Website\WebsiteDetailController@billingPage');
    });

    Route::get('payment-success', 'Website\PaymentController@paymentsuccess')->name('payment.success');


    Route::get('cancel', function () {
        dd('cancel');
    })->name('payment.cancel');


});
Auth::routes();

//ContactPage
Route::get('/contact', 'Website\WebsiteDetailController@showDetails');

//Website Page Url
Route::get('/', 'Website\ProductController@index');

//Save Enquiry
Route::post('/saveEnquiry', 'Website\EnquiryController@saveEnquiry');

//Save Feedback
Route::post('/saveFeedback', 'Website\FeedbackController@saveFeedback');

//Save User/Admin Register
Route::post('/registerUser', 'User\UserController@registeruser');
Route::post('/registerAdmin', 'User\UserController@registerAdmin');


Route::get('/send-mail', function () {

    Mail::to('ajitsubedi2011@gmail.com') ->send(new OrderMail());

    return 'A message has been sent to Mailtrap!';

});

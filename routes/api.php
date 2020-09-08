<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*Brand Routes*/
Route::post('/postbrand','Admin\BrandController@createBrand');
Route::post('/saveEditBrand','Admin\BrandController@updateBrand');
Route::get('/getBrand','Admin\BrandController@getBrand');
Route::delete('/deleteBrand/{id}','Admin\BrandController@deleteBrand');


/*Category Routes*/
Route::post('/postCategory','Admin\CategoryController@createCategory');
Route::post('/addsubcategory','Admin\CategoryController@createSubcategory');
Route::post('/saveEditCategory','Admin\CategoryController@updateCategory');
Route::get('/getCategories','Admin\CategoryController@getCategory');
Route::get('/getSubCategories','Admin\CategoryController@getSubCategory');
Route::delete('/deleteCategory/{id}','Admin\CategoryController@deleteCategory');


/*Product Routes*/
Route::post('/addProduct','Admin\ProductController@CreateProduct');
Route::post('/editProduct','Admin\ProductController@editProduct');
Route::post('/addDiscount','Admin\ProductController@addDiscount');
Route::patch('/deleteDiscount/{id}','Admin\ProductController@deleteDiscount');
Route::get('/getProduct','Admin\ProductController@getProduct');
Route::get('/getDiscountedProduct','Admin\ProductController@getDiscountedProduct');
Route::delete('/deleteProduct/{id}','Admin\ProductController@deleteProduct');


/*Tags Routes*/
Route::post('/postTags','Tag\TagController@saveTag');
Route::post('/saveEditTag','Tag\TagController@updateTag');
Route::get('/getTag','Tag\TagController@getTags');
Route::delete('/deleteTag/{id}','Tag\TagController@deleteTag');


/*Banner Image Routes */
Route::post('/postBannerImage','Admin\BannerImageController@saveBannerImage');
Route::patch('/activeBanner/{id}','Admin\BannerImageController@setActive');
Route::patch('/inactiveBanner/{id}','Admin\BannerImageController@setInActive');
Route::get('/getBannerImage','Admin\BannerImageController@getBannerImage');
Route::delete('/deleteBanner/{id}','Admin\BannerImageController@deleteBannerImage');


/*Review Image Routes */
Route::post('/postReviewImage','Website\WebsiteDetailController@saveReviewImage');
Route::patch('/activeReview/{id}','Website\WebsiteDetailController@setActive');
Route::patch('/inactiveReview/{id}','Website\WebsiteDetailController@setInActive');
Route::get('/getReviewImage','Website\WebsiteDetailController@getReviewImage');
Route::delete('/deleteReview/{id}','Website\WebsiteDetailController@deleteReviewImage');


/*Website Detail Route */
Route::post('/postWebsiteDetail','Website\WebsiteDetailController@saveWebsitedetail');
Route::patch('/saveEditWebsiteDetail','Website\WebsiteDetailController@updateWebsiteDetail');
Route::get('/getWebsiteDetail','Website\WebsiteDetailController@getWebsiteDetail');
Route::delete('/deleteWebsiteDetail/{id}','Website\WebsiteDetailController@deleteWebsiteDetail');

//get Order Detail
Route::get('/getOrderDetail','Order\OrderController@getOrder');

//User
Route::get('/getUser','User\UserController@singleUserDetail');
Route::post('/saveEditProfile','User\UserController@updateUser');
Route::get('/allUsers','User\UserController@fetchUsers');
Route::delete('/deleteUser/{id}','User\UserController@deleteUser');


//Enquiries
Route::get('/getEnquiries','Website\EnquiryController@fetchEnquiry');
Route::delete('/deleteEnquiry/{id}','Website\EnquiryController@deleteEnquiry');

/*feedback*/
Route::get('/fetchFeedback','Website\FeedbackController@fetchFeedback');
Route::delete('/deleteFeedback/{id}','Website\FeedbackController@deleteFeedback');

/* Service Requests */
Route::post('/saveService','Admin\ServiceController@addService');
Route::get('/getService','Admin\ServiceController@fetchService');
Route::delete('/deleteService/{id}','Admin\ServiceController@deleteService');
Route::patch('/saveEditService','Admin\ServiceController@saveEditService');

//Payment
Route::post('/paypalCheckOut', 'Website\PaymentController@paypalCheckOut');
Route::post('/userBillingDetails', 'User\UserController@userBillingDetails');

Route::post('/stripeCheckOut', 'Website\PaymentController@stripeCheckOut');

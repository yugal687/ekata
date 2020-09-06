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


Route::post('/postbrand','Admin\BrandController@createBrand');
Route::post('/postCategory','Admin\CategoryController@createCategory');
Route::post('/addsubcategory','Admin\CategoryController@createSubcategory');
Route::post('/addProduct','Admin\ProductController@CreateProduct');
Route::post('/postTags','Tag\TagController@saveTag');
Route::post('/postBannerImage','Admin\BannerImageController@saveBannerImage');
Route::post('/postReviewImage','Website\WebsiteDetailController@saveReviewImage');
Route::post('/postWebsiteDetail','Website\WebsiteDetailController@saveWebsitedetail');


Route::post('/saveEditCategory','Admin\CategoryController@updateCategory');
Route::post('/saveEditBrand','Admin\BrandController@updateBrand');
Route::post('/saveEditTag','Tag\TagController@updateTag');
Route::post('/addDiscount','Admin\ProductController@addDiscount');
Route::post('/editProduct','Admin\ProductController@editProduct');
Route::patch('/deleteDiscount/{id}','Admin\ProductController@deleteDiscount');
Route::patch('/activeBanner/{id}','Admin\BannerImageController@setActive');
Route::patch('/inactiveBanner/{id}','Admin\BannerImageController@setInActive');
Route::patch('/activeReview/{id}','Website\WebsiteDetailController@setActive');
Route::patch('/inactiveReview/{id}','Website\WebsiteDetailController@setInActive');
Route::patch('/saveEditWebsiteDetail','Website\WebsiteDetailController@updateWebsiteDetail');



Route::get('/getCategories','Admin\CategoryController@getCategory');
Route::get('/getSubCategories','Admin\CategoryController@getSubCategory');
Route::get('/getBrand','Admin\BrandController@getBrand');
Route::get('/getTag','Tag\TagController@getTags');
Route::get('/getProduct','Admin\ProductController@getProduct');
Route::get('/getBannerImage','Admin\BannerImageController@getBannerImage');
Route::get('/getReviewImage','Website\WebsiteDetailController@getReviewImage');
Route::get('/getDiscountedProduct','Admin\ProductController@getDiscountedProduct');
Route::get('/getWebsiteDetail','Website\WebsiteDetailController@getWebsiteDetail');
Route::get('/getOrderDetail','Order\OrderController@getOrder');

Route::delete('/deleteCategory/{id}','Admin\CategoryController@deleteCategory');
Route::delete('/deleteBrand/{id}','Admin\BrandController@deleteBrand');
Route::delete('/deleteTag/{id}','Tag\TagController@deleteTag');
Route::delete('/deleteBanner/{id}','Admin\BannerImageController@deleteBannerImage');
Route::delete('/deleteReview/{id}','Website\WebsiteDetailController@deleteReviewImage');
Route::delete('/deleteProduct/{id}','Admin\ProductController@deleteProduct');
Route::delete('/deleteWebsiteDetail/{id}','Website\WebsiteDetailController@deleteWebsiteDetail');

Route::get('/getUser','User\UserController@singleUserDetail');
Route::get('/getEnquiries','Website\EnquiryController@fetchEnquiry');
Route::delete('/deleteEnquiry/{id}','Website\EnquiryController@deleteEnquiry');

Route::get('/fetchFeedback','Website\FeedbackController@fetchFeedback');
Route::delete('/deleteFeedback/{id}','Website\FeedbackController@deleteFeedback');

/* Service Requests */
Route::post('/saveService','Admin\ServiceController@addService');
Route::get('/getService','Admin\ServiceController@fetchService');
Route::delete('/deleteService/{id}','Admin\ServiceController@deleteService');
Route::patch('/saveEditService','Admin\ServiceController@saveEditService');


Route::post('/paypalCheckOut', 'Website\PaymentController@paypalCheckOut');
Route::post('/userBillingDetails', 'User\UserController@userBillingDetails');

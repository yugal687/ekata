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


Route::post('/saveEditCategory','Admin\CategoryController@updateCategory');
Route::post('/saveEditBrand','Admin\BrandController@updateBrand');
Route::post('/saveEditTag','Tag\TagController@updateTag');
Route::post('/addDiscount','Admin\ProductController@addDiscount');
Route::post('/editProduct','Admin\ProductController@editProduct');
Route::patch('/deleteDiscount/{id}','Admin\ProductController@deleteDiscount');
Route::patch('/activeBanner/{id}','Admin\BannerImageController@setActive');



Route::get('/getCategories','Admin\CategoryController@getCategory');
Route::get('/getSubCategories','Admin\CategoryController@getSubCategory');
Route::get('/getBrand','Admin\BrandController@getBrand');
Route::get('/getTag','Tag\TagController@getTags');
Route::get('/getProduct','Admin\ProductController@getProduct');
Route::get('/getBannerImage','Admin\BannerImageController@getBannerImage');
Route::get('/getDiscountedProduct','Admin\ProductController@getDiscountedProduct');

Route::delete('/deleteCategory/{id}','Admin\CategoryController@deleteCategory');
Route::delete('/deleteBrand/{id}','Admin\BrandController@deleteBrand');
Route::delete('/deleteTag/{id}','Tag\TagController@deleteTag');
Route::delete('/deleteBanner/{id}','Admin\BannerImageController@deleteBannerImage');
Route::delete('/deleteProduct/{id}','Admin\ProductController@deleteProduct');


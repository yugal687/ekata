<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\BannerImage;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $getProduct = Product::with(array('category', 'brand', 'tags', 'image' => function ($query) {
            return $query->take(1);
        }))->get();
        $discountedProducts = Product::with(array('category', 'brand', 'tags', 'image'))->where('discount', '>', 0)->latest()->get();
        $latestProduct = Product::with(array('category', 'brand', 'tags', 'image'))->latest()->get();
        $bannerImage = BannerImage::where('active', 1)->get();
        $getcategory = Category::where('parent_id','=',NULL)->with('product')->get();
        $bestSelling = Product::inRandomOrder()->limit(3)->where('discount', '=', NULL)->with(array('category', 'brand', 'tags', 'image'))->get();

        return view('website.index',
            [
                'getProduct' => $getProduct,
                'discountedProducts' => $discountedProducts,
                'latestProduct' => $latestProduct,
                'bannerImage' => $bannerImage,
                'getCategory' => $getcategory,
                'bestSelling' =>$bestSelling
            ]);
    }
    public function showCategory($id){
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $getsingleCategory = Category::where('id',$id)->with('product','parent','children')->get();
        //dd($getsingleCategory);
        return view('website.category',
            [
                'getsingleCategory' => $getsingleCategory,
                'getCategory' => $getcategory

            ]);
    }
    public function showMainCategory($id){
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $getsingleCategory = Category::where('id',$id)->with('product','parent','children')->get();
        //dd($getsingleCategory);
        return view('website.mainCategory',
            [
                'getsingleCategory' => $getsingleCategory,
                'getCategory' => $getcategory

            ]);
    }
    public function SingleProductPage($id){
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $singleproduct = Product::where('id',$id)->with(array('category', 'brand', 'tags', 'image'))->get();
        return view('website.singleProduct',
            [
                'getCategory' => $getcategory,
                'singleProduct' => $singleproduct

            ]);
    }
    public function showProducts(){
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $getproduct = Product::inRandomOrder()->where('discount', '=', NULL)->with(array('category', 'brand', 'tags', 'image'))->get();
        return view('website.products',
            [
                'getproduct' => $getproduct,
                'getCategory' => $getcategory

            ]);
    }
}

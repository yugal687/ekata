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
        //dd($getProduct);
        $discountedProducts = Product::with(array('category', 'brand', 'tags', 'image'))->where('discount', '>', 0)->latest()->get();
        $latestProduct = Product::with(array('category', 'brand', 'tags', 'image'))->latest()->get();
        $bannerImage = BannerImage::where('active', 1)->get();
        $getcategory = Category::with('product')->get();
//dd($latestProduct);
        return view('website.index',
            [
                'getProduct' => $getProduct,
                'discountedProducts' => $discountedProducts,
                'latestProduct' => $latestProduct,
                'bannerImage' => $bannerImage,
                'getCategory' => $getcategory

            ]);
    }

    public function getCategory()
    {
        $getcategory = Category::with('product')->where('parent_id','=','NULL')->get();
        //dd($getcategory);
        return view('layouts.website.indexsidebar',
            [
                'getCategory' => $getcategory
            ]);
    }
}

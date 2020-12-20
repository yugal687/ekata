<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\BannerImage;
use App\Model\Category;
use App\Model\Product;
use App\Model\ReviewImage;
use App\Model\Service;
use App\Model\Tag;
use App\Model\WebsiteDetail;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $getProduct = Product::with(array('category', 'brand', 'tags', 'image' => function ($query) {
            return $query->take(1);
        }))->get();
        $clearanceProducts = Product::with(array('category', 'brand', 'tags', 'image'))->where('discount', '>', 0)->get();
        $discountedProducts = Product::with(array('category', 'brand', 'tags', 'image'))->where('discount', '>', 0)->limit(8)->latest()->get();
        $latestProduct = Product::with(array('category', 'brand', 'tags', 'image'))->limit(10)->latest()->get();
        $bannerImage = BannerImage::where('active', 1)->get();
        $reviewImage = ReviewImage::where('active', 1)->get();
        $getWebsiteDetail = WebsiteDetail::all();
        $getcategory = Category::where('parent_id','=',NULL)->with('product','images')->get();
        $categories = Category::where('parent_id','=',NULL)->with(['product'=>function($q){
           return $q->take(4)->get();
        },'children'=>function(){

        }])->limit(3)->get();
        $todaySpecial = Tag::with(array('product'))->where('tags','Today Special')->latest()->get();
        $weeklySpecial = Tag::with(array('product'))->where('tags','Week Special')->latest()->get();
        $bestSelling = Product::inRandomOrder()->limit(3)->where('discount', '=', NULL)->with(array('category', 'brand', 'tags', 'image'))->get();
        $special = Product::with(['category', 'brand', 'tags'=>function($q){
            return $q->where('tags','Special')->get();
        },'image'])->get();

        return view('website.index',
            [
                'weeklyspecial'=>$weeklySpecial,
                'todayspecial'=>$todaySpecial,
                'special'=>$special,
                'getProduct' => $getProduct,
                'clearanceProducts' => $clearanceProducts,
                'discountedProducts' => $discountedProducts,
                'latestProduct' => $latestProduct,
                'bannerImage' => $bannerImage,
                'getCategory' => $getcategory,
                'bestSelling' =>$bestSelling,
                'reviewImage' =>$reviewImage,
                'websiteDetail' =>$getWebsiteDetail,
                'categories' =>$categories
            ]);
    }
    public function showCategory($id){
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $getsingleCategory = Category::where('id',$id)->with(['product','parent','children'])->get();
        $getWebsiteDetail = WebsiteDetail::all();
        //dd($getsingleCategory);
        return view('website.category',
            [
                'getsingleCategory' => $getsingleCategory,
                'getCategory' => $getcategory,
                'websiteDetail' =>$getWebsiteDetail



            ]);
    }
    public function showMainCategory($id){
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $getsingleCategory = Category::where('id',$id)->with('product','parent','children')->get();
        $getWebsiteDetail = WebsiteDetail::all();
        //dd($getsingleCategory);
        return view('website.mainCategory',
            [
                'getsingleCategory' => $getsingleCategory,
                'getCategory' => $getcategory,
                'websiteDetail' =>$getWebsiteDetail


            ]);
    }
    public function SingleProductPage($id){
        //dd($id);
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $singleproduct = Product::where('id',$id)->with(array('category', 'brand', 'tags', 'image'))->get();
        //dd($singleproduct[0]->category->id);
        $category = Category::where('id',$singleproduct[0]->category->id)->with(['product'=> function ($query) use($id) {
            $query->where('id', '!=', $id);},'parent','children'])->get();
        $getWebsiteDetail = WebsiteDetail::all();
        return view('website.singleProduct',
            [
                'getCategory' => $getcategory,
                'singleProduct' => $singleproduct,
                'websiteDetail' =>$getWebsiteDetail,
                'category' =>$category

            ]);
    }
    public function showProducts(Request $request){
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $getWebsiteDetail = WebsiteDetail::all();
        $getproduct = Product::with(array('category', 'brand', 'tags', 'image'))->paginate(16);
        return view('website.products',
            [
                'getproduct' => $getproduct,
                'getCategory' => $getcategory,
                'websiteDetail' =>$getWebsiteDetail
            ]);
    }
    public function searchProducts(Request $request){
        $products=Product::where('product_name','LIKE','%'.$request->search."%")->
        with(array('category', 'brand', 'tags', 'image'))->paginate(16);
        $getcategory = Category::where('parent_id','=',NULL)->with('product','parent','children')->get();
        $getWebsiteDetail = WebsiteDetail::all();
        $getproduct = Product::where('discount', '=', NULL)->with(array('category', 'brand', 'tags', 'image'))->paginate(5);
        return view('website.searchedproducts',
            [
                'products' => $products,
                'getproduct' => $getproduct,
                'getCategory' => $getcategory,
                'websiteDetail' =>$getWebsiteDetail
            ]);
    }
    public function service(){
        $Service = Service::all();
        $getWebsiteDetail = WebsiteDetail::all();
        return view('website.services',[
           'services' => $Service,
            'websiteDetail' =>$getWebsiteDetail

        ]);
    }
    public function serviceDetails($id){
        $Service = Service::where('id',$id)->get();
        $getWebsiteDetail = WebsiteDetail::all();
        return view('website.servicedetails',[
            'services' => $Service,
            'websiteDetail' =>$getWebsiteDetail

        ]);
    }
}

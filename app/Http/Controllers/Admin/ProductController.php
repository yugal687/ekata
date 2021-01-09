<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Imagable;
use App\Model\Product;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function CreateProduct(Request $request)
    {
        //dd($request);
        $validate = $request->validate([
            'image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'additional_information' => 'required',
            'quantity' => 'required'
        ]);
        if ($validate) {

            $saveProduct = Product::create([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'additional_information' => $request->additional_information,
                'quantity' => $request->quantity,
            ]);

            foreach ($request->file('image') as $image) {


                $baseName = Str::random(20);
                $originalName = $baseName . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads'), $originalName);

                $saveimage = Product::orderBy('id', 'DESC')->first();
                $saveimage->image()->create([
                    'name' => '/uploads/' . $originalName,
                    'imagable_id' =>$saveProduct->id
                ]);

            }
            if ($request->tag >0) {
                // dd($request->tag);
                foreach ($request->tag as $tag) {
                    $savetags = DB::table('products_tags')->insert([
                        'product_id' => $saveProduct->id,
                        'tag_id' => $tag
                    ]);
                }
            }

        }
        return response()->json([
            'message' => 'Product Added sucessfully !!!'
        ]);
    }
    public function getProduct(){
        $getProduct = Product::with(['category' => function ($query) {
            $query->with('parent','children');},'brand','tags','image'])->get();
        return response()->json([
           'getProduct' => $getProduct
        ]);
    }
    public function addDiscount(Request $request){
        //dd($request);
        $saveDiscount = Product::findorFail($request->id)->update([
            'discount' => $request->discount,
            'sale_price' => $request->sale_price
        ]);
        if ($request->tag >0) {
            // dd($request->tag);
            foreach ($request->tag as $tag) {
                $savetags = DB::table('products_tags')->insert([
                    'product_id' => $request->id,
                    'tag_id' => $tag
                ]);
            }
        }
        return response()->json([
           'message' => 'Discount added on Product!!!'
        ]);

    }
    public function  getDiscountedProduct(){
        $getDiscountedProduct = Product::where('discount' ,'>',0)->latest()->get();
        return response()->json([
           'getDiscountedProduct' =>$getDiscountedProduct
        ]);
    }
    public function deleteProduct($id){
        $deleteProduct = Product::findorFail($id)->delete();
        return response()->json([
           'message' => 'Product Deleted !!!'
        ]);
    }
    public function deleteDiscount($id){
        $deleteDiscount = Product::findorFail($id)->update([
           'sale_price' => 0,
           'discount' => 0
        ]);
        return response()->json([
            'message' => 'Discount Deleted !!!'
        ]);
    }
    public function editProduct(Request $request){
        //dd($request);
        $editedProduct = json_decode($request->editedProduct);
        $findCategory = Category::where('category_name','=',$request->category_name)->get();
        $findBrand = Brand::where('brand_name','=',$editedProduct[0]->brand->brand_name)->get();
        $saveEditProduct =Product::where('id',$editedProduct[0]->id)->update([
            'product_name' => $editedProduct[0]->product_name,
            'quantity' => $editedProduct[0]->quantity,
            'category_id' => $findCategory[0]->id,
            'brand_id' => $findBrand[0]->id,
            'price' => $editedProduct[0]->price,
            'additional_information' => $editedProduct[0]->additional_information,
        ]);
        if ($request->tag > 0) {
            $deletetag = DB::table('products_tags')->where('product_id', $editedProduct[0]->id)->delete();
            foreach ($request->tag as $tag) {
                $savetags = DB::table('products_tags')->insert([
                    'product_id' => $editedProduct[0]->id,
                    'tag_id' => $tag
                ]);
            }
        }
       // dd($request->image);
        if ($request->image > 0) {
            foreach ($request->image as $image) {


                $baseName = Str::random(20);
                $originalName = $baseName . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads'), $originalName);

                $saveimage = Product::where('id', $editedProduct[0]->id)->first();
                $saveimage->image()->create([
                    'name' => '/uploads/' . $originalName,
                ]);

            }
        }
        return response()->json([
           'message' => 'Product Updated !!'
        ]);
    }


}

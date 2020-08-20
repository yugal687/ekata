<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
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

                $saveimage = DB::table('imagable')->insert([
                    'name' => '/uploads/' . $originalName,
                    'imagable_id' =>$saveProduct->id,
                    'imagable_type' =>'aaaa'
                ]);

            }
            dd($request->tag);
            foreach ($request['tag'] as $tag){
                $savetags = Tag::create([
                    'tags' => $tag,
                    'product_id' =>$saveProduct->id
                ]);
            }

        }
        return response()->json([
            'message' => 'Product Added sucessfully !!!'
        ]);
    }
    public function getProduct(){
        $getProduct = Product::with('category','brand','tags')->get();
        return response()->json([
           'getProduct' => $getProduct
        ]);
    }
}

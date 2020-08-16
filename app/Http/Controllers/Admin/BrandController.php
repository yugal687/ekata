<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function createBrand(Request $request){
        //dd($request);
        $validate =$request->validate([
           'brand_name' => 'required'
        ]);
        if($validate){
            $createBrand = Brand::create([
                'brand_name' => $request->brand_name,
            ]);
        }
        return response()->json([
           'message' => 'Brand added sucessfully'
        ]);
    }
    public function getBrand(){
        $getBrand = Brand::all();
        return response()->json([
          'getBrand' => $getBrand
        ]);
    }
    public function deleteBrand($id){
        $deleteBrand = Brand::find($id)->delete();
        return response()->json([
           'message' => 'Brand Deleted!!!!'
        ]);
    }
}

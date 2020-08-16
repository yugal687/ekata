<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        //dd($request);
        $validate = $request->validate([
           'category_name' =>'required'
        ]);
        if ($validate){
            $savecategory = Category::create([
               'category_name' => $request->category_name,
                'parent_id' => $request->parent_id
            ]);
        }
        return response()->json([
           'message' => 'Category added sucessfully'
        ]);
    }

   /* public function createSubcategory(Request $request){
        $validate = $request->validate([
            'category_name' =>'required'
        ]);
        if ($validate){
            $addsubcategory = Category::create([
               'category_name' =>$request->category_name,

            ]);
        }
    }
   */

    public function getCategory(){
        $getCategory = Category::all();
        return response()->json([
           'getCategory' => $getCategory
        ]);
    }
    public function getSubCategory(){
        $getSubCategory = Category::get()->where('parent_id','>','0');
        return response()->json([
            'getSubCategory' => $getSubCategory
        ]);
    }
}

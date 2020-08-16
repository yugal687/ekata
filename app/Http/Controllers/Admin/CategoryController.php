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
        $getCategory = Category::where('parent_id',NULL)->get();
        return response()->json([
           'getCategory' => $getCategory
        ]);
    }
    public function getSubCategory(){
        $getSubCategory = Category::where('parent_id','>',0)->get();
        return response()->json([
            'getSubCategory' => $getSubCategory
        ]);
    }
    public function deleteCategory($id){
     $deleteCategory = Category::find($id)->delete();
     return response()->json([
        'message' => 'Category Deleted !!!'
     ]);
    }
    public function updateCategory(Request $request){
//dd($request);
$updatecategory = Category::findOrFail($request->editCategory[0]['id']);
$updatecategory->category_name = $request->editCategory[0]['category_name'];
$updatecategory->parent_id = $request->editCategory[0]['parent_id'];
$updatecategory->save();

return response()->json([
   'message' => 'Category Updated'
]);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\CategoryBanner;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        //dd($request);
        $validate = $request->validate([
           'category_name' =>'required'
        ]);
        if ($validate){
            foreach ($request->file('bannerCategory') as $bannerCategory) {

                $baseName = Str::random(20);
                $originalName = $baseName . '.' . $bannerCategory->getClientOriginalExtension();
                $bannerCategory->move(public_path('/uploads'), $originalName);
                $savecategory = Category::create([
                    'category_name' => $request->category_name,
                    'image' => '/uploads/' . $originalName,
                    'parent_id' => $request->parent_id
                ]);
            }

            foreach ($request->file('thumbnailCategory') as $thumbnailCategory) {


                $baseName = Str::random(20);
                $originalName = $baseName . '.' . $thumbnailCategory->getClientOriginalExtension();
                $thumbnailCategory->move(public_path('/uploads'), $originalName);

                $saveimage = Category::orderBy('id', 'DESC')->first();
                $saveimage->images()->create([
                    'name' => '/uploads/' . $originalName,
                ]);
            }
        }
        return response()->json([
           'message' => 'Category added sucessfully',
            'category' => $savecategory
        ]);
    }

    public function createSubcategory(Request $request){
        $validate = $request->validate([
            'category_name' =>'required'
        ]);
        if ($validate){
            $addsubcategory = Category::create([
               'category_name' =>$request->category_name,
                'parent_id' => $request->parent_id

            ]);
        }
        return response()->json([
           'message' => 'SubCategory Added Sucessfully !!!'
        ]);
    }

    public function getCategory(){
        $getCategory = Category::where('parent_id',NULL)->get();
        return response()->json([
           'getCategory' => $getCategory
        ]);
    }
    public function getAllCategory(){
        $getCategory = Category::with('children')->where('parent_id','=',NULL)->get();
        return response()->json([
            'getCategory' => $getCategory
        ]);
    }
    public function getSubCategory(){
        $getSubCategory = Category::with('parent')->where('parent_id','>',0)->get();
        return response()->json([
            'getSubCategory' => $getSubCategory
        ]);
    }
    public function deleteCategory($id){
     $deleteCategory = Category::where('id',$id)->update([
         'category_name' => 'Un-categorized'
     ]);
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

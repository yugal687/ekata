<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
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
}

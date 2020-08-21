<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTags(){
        $tag = Tag::all();
        return response()->json([
           'tags' => $tag
        ]);

    }
    public function saveTag(Request $request){
        $validate = $request->validate([
            'tags' => 'required'
        ]);
        if ($validate){
            $saveTags = Tag::create([
               'tags' => $request->tags
            ]);
        }
        return response()->json([
           'message' => 'Tags Saved sucessfully'
        ]);
    }
    public function deleteTag($id){
        $deleteTag = Tag::find($id)->delete();
        return response()->json([
           'message' => 'Tag Deleted!!!!'
        ]);
    }
    public function updateTag(Request $request){
        $editTag = Tag::findorFail($request->editTag[0]['id']);
        $editTag->tags = $request->editTag[0]['tags'];
        $editTag->save();
        return response()->json([
           'message' => 'Tag Updated !!!'
        ]);
    }
}

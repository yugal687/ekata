<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerImageController extends Controller
{
    public function saveBannerImage(Request $request){
        $validate = $request->validate([
            'image' => 'required'
        ]);
        if ($validate){
            foreach ($request->file('image') as $image) {
                $baseName = Str::random(20);
                $originalName = $baseName . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads'), $originalName);
                $saveBanner = BannerImage::create([
                    'image' => '/uploads/' . $originalName,
                    'active' => 0,

                ]);
            }
        }
        return response()->json([
           'message' => 'Banner Image Saved!!!'
        ]);
    }
    public function setActive($id){
        $setActive = BannerImage::findorFail($id)->update([
           'active' => 1
        ]);
        return response()->json([
           'message' => 'Selected Image Is Active !!'
        ]);
    }
    public function setInActive($id){
        $setActive = BannerImage::findorFail($id)->update([
            'active' => 0
        ]);
        return response()->json([
            'message' => 'Selected Image Is InActive !!'
        ]);
    }
    public function getBannerImage(){
        $getBannerImage = BannerImage::all();
        return response()->json([
           'getBannerImage' => $getBannerImage
        ]);
    }
    public  function deleteBannerImage($id){
        $deleteBanner = BannerImage::findorFail($id)->delete();
        return response()->json([
           'message' => 'Banner Image Deleted !!!'
        ]);
    }
}

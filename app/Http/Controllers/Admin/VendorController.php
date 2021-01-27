<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function create(Request $request){
        $validator= Validator::make($request->all(),[
            'vendor_name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'address'=>'required'
        ]);
        if ($validator->fails()){
            return response()->json([
               'error'=>$validator->errors()
            ]);
        }
        Vendor::create([
            'vendor_name'=>$request->vendor_name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'address'=>$request->address
        ]);
        return response()->json([
           'message'=>'Vendor Created Successfully !!'
        ]);
    }
    public function fetch(){
        $vendors=Vendor::all();
        return response()->json([
           'vendors'=>$vendors
        ]);
    }
    public function delete($id){
        Vendor::where('id',$id)->delete();
        return response()->json([
           'message'=>'Vendor deleted successfully!!'
        ]);
    }
    public function update(Request $request){
        //dd($request->all());
        Vendor::where('id',$request->id)->update([
            'vendor_name'=>$request->vendor_name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'address'=>$request->address
        ]);
        return response()->json([
           'message'=>'vendor updated sucessfully !!'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\WebsiteDetail;
use Illuminate\Http\Request;

class WebsiteDetailController extends Controller
{
    public function saveWebsitedetail(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);
        if ($validate){
            $saveDetail = WebsiteDetail::create([
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'additional_information' => $request->additional_information
            ]);
        }
        return response()->json([
            'message' => 'Website Detail Added Sucessfully !!!'
        ]);
    }
    public function getWebsiteDetail(){
        $getWebsiteDetail = WebsiteDetail::all();
        return response()->json([
           'WebsiteDetail' =>  $getWebsiteDetail
        ]);
    }
    public function deleteWebsiteDetail($id){
        $deleteDetail = WebsiteDetail::findorFail($id)->delete();
        return response()->json([
           'message' => 'Website Detail Deleted Sucessfully !!!'
        ]);
    }
    public  function updateWebsiteDetail(Request $request){
        $editedWebsiteDetail = json_decode($request->editedWebsiteDetail);

        $updateDetail = WebsiteDetail::findorFail($editedWebsiteDetail[0]->id)->update([
            'email' => $editedWebsiteDetail[0]->email,
            'contact_number' => $editedWebsiteDetail[0]->contact_number,
            'address' => $editedWebsiteDetail[0]->address,
            'additional_information' => $editedWebsiteDetail[0]->additional_information
        ]);
        return response()->json([
           'message' => 'Website Detail updated Sucessfully !!!'
        ]);
    }
}

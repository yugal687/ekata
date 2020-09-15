<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function saveEnquiry(Request $request){
        $enquiry = Enquiry::create([
            'name' => $request->input('firstname'),
            'email' => $request->input('email'),
            'number' => $request->input('phone'),
            'description' => $request->input('description')
        ]);
        return redirect()->back();
    }
    public function fetchEnquiry(){
        $Enquiries = Enquiry::all();
        return response()->json([
           'enquiries' => $Enquiries
        ]);
    }
    public function deleteEnquiry($id){
        $deleteEnquiry = Enquiry::findorFail($id)->delete();
        return response()->json([
           'message' => 'Enquiry Deleted !!!'
        ]);
    }
}

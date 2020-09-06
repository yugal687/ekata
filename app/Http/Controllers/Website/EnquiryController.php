<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function saveEnquiry(Request $request){
        $enquiry = Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'description' => $request->description
        ]);
    }
    public function fetchEnquiry(){
        $Enquiries = Enquiry::all();
    }
}

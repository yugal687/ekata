<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\BannerImage;
use App\Model\PostalCode;
use App\Model\ReviewImage;
use App\Model\WebsiteDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebsiteDetailController extends Controller
{
    public function saveWebsitedetail(Request $request)
    {
        //dd($request);
        $validate = $request->validate([
            'email' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);
        if ($validate) {
            $saveDetail = WebsiteDetail::create([
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'optional_email' => $request->optional_email,
                'optional_contact' => $request->optional_contact,
                'additional_information' => $request->additional_information
            ]);
        }
        return response()->json([
            'message' => 'Website Detail Added Sucessfully !!!'
        ]);
    }

    public function getWebsiteDetail()
    {
        $getWebsiteDetail = WebsiteDetail::all();
        return response()->json([
            'WebsiteDetail' => $getWebsiteDetail
        ]);
    }

    public function deleteWebsiteDetail($id)
    {
        $deleteDetail = WebsiteDetail::findorFail($id)->delete();
        return response()->json([
            'message' => 'Website Detail Deleted Sucessfully !!!'
        ]);
    }

    public function updateWebsiteDetail(Request $request)
    {
        //dd($request);

        $editedWebsiteDetail = $request->WebsiteDetail;
        //dd($editedWebsiteDetail[0]['id']);
        $updateDetail = WebsiteDetail::findorFail($editedWebsiteDetail[0]['id'])->update([
            'email' => $editedWebsiteDetail[0]['email'],
            'optional_email' => $editedWebsiteDetail[0]['optional_email'],
            'optional_contact' => $editedWebsiteDetail[0]['optional_contact'],
            'contact_number' => $editedWebsiteDetail[0]['contact_number'],
            'address' => $editedWebsiteDetail[0]['address'],
            'additional_information' => $editedWebsiteDetail[0]['additional_information'],
        ]);
        return response()->json([
            'message' => 'Website Detail updated Sucessfully !!!'
        ]);
    }

    public function showDetails()
    {
        $websiteDetails = WebsiteDetail::all();
        return view('website.contact', [
            'websiteDetail' => $websiteDetails
        ]);
    }

    public function saveReviewImage(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required'
        ]);
        if ($validate) {
            foreach ($request->file('image') as $image) {
                $baseName = Str::random(20);
                $originalName = $baseName . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads'), $originalName);
                $saveBanner = ReviewImage::create([
                    'image' => '/uploads/' . $originalName,
                    'active' => 0,

                ]);
            }
        }
        return response()->json([
            'message' => 'Review Image Saved!!!'
        ]);
    }

    // k save active ho yo??? please comment here
    public function setActive($id)
    {
        $setActive = ReviewImage::findorFail($id)->update([
            'active' => 1
        ]);
        return response()->json([
            'message' => 'Selected Image Is Active !!'
        ]);
    }

    public function setInActive($id)
    {
        $setActive = ReviewImage::findorFail($id)->update([
            'active' => 0
        ]);
        return response()->json([
            'message' => 'Selected Image Is InActive !!'
        ]);
    }

    public function getReviewImage()
    {
        $getReviewImage = ReviewImage::all();
        return response()->json([
            'getReviewImage' => $getReviewImage
        ]);
    }

    public function deleteReviewImage($id)
    {
        $deleteReview = ReviewImage::findorFail($id)->delete();
        return response()->json([
            'message' => 'Review Image Deleted !!!'
        ]);
    }

    public function aboutUs()
    {
        $websiteDetails = WebsiteDetail::all();
        return view('website.aboutus', [
            'websiteDetail' => $websiteDetails
        ]);
    }

    public function billingPage()
    {
        $websiteDetails = WebsiteDetail::all();
        return view('website.billings', [
            'websiteDetail' => $websiteDetails
        ]);
    }


}

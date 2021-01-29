<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Event;
use App\Model\WebsiteDetail;



class EventController extends Controller
{
    public function allEvents()
    {
        $events = Event::where('status', '1')->get();
        $getWebsiteDetail = WebsiteDetail::all();
        return view('website.events', [
            'websiteDetail' => $getWebsiteDetail,
            'events' => $events

        ]);
    }
    public function eventDetail($id){
        $events=Event::where('id',$id)->get();
        $getWebsiteDetail = WebsiteDetail::all();
        return view('website.eventdetails',[
            'websiteDetail' =>$getWebsiteDetail,
            'events'=>$events

        ]);
    }
}

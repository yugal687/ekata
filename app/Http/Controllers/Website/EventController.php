<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;


class EventController extends Controller
{
    public function allEvents(){
        $events=Event::where('status','1')->get();
        $getWebsiteDetail = WebsiteDetail::all();
return view(website.events,[
    'websiteDetail' =>$getWebsiteDetail,
    'events'=>$events

]);
    }
}

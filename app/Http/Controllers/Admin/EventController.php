<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function save(Request $request){
        $validator=Validator::make($request->all(),[
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);
        if ($validator->fails()){
            return response()->json([
               'error'=>$validator->errors()
            ]);
        }
        Event::create([
            'title'=>$request->title,
            'image'=>$request->image,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        ]);
        return response()->json([
           'message'=>'Event created successfully'
        ]);


    }
}

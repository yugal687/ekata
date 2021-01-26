<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
        Event::create([
            'title' => $request->title,
            'image' => $request->image,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        return response()->json([
            'message' => 'Event created successfully'
        ]);
    }

    public function fetch()
    {
        $allevents = Event::all();
        return response()->json([
            'events' => $allevents
        ]);
    }

    public function update(Request $request)
    {
        Event::where('id', $request->id)->update([

        ]);
        return response()->json([
            'message' => 'Event Updated Sucessfully !!'
        ]);
    }

    public function delete($id)
    {
        Event::where('id', $id)->delete();
        return response()->json([
            'message' => 'Event deleted sucessfully!!'
        ]);
    }

    public function changeStatus($id)
    {
        $event = Event::where('id', $id)->get();a
        Event::where('id', $id)->update([
            'status' => $event->status == 0 ? 1 : 0
        ]);
        return response()->json([
            'message' => 'Event set as active !!'
        ]);
    }
}

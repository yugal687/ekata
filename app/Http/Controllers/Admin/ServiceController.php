<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function addService(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'details' => 'required'
        ]);
        if ($validate) {
            $saveService = Service::create([
                'title' => $request->title,
                'date' => $request->date,
                'details' => $request->details
            ]);
        }
        return response()->json([
            'message' => 'Service Saved !!!'
        ]);
    }

    public function fetchService()
    {
        $Service = Service::all();
        return response()->json([
            'service' => $Service
        ]);
    }

    public function deleteService($id)
    {
        $deleteService = Service::findorFail($id)->delete();
        return response()->json([
            'message' => 'Service Deleted !!'
        ]);
    }

    public function saveEditService(Request $request)
    {
        //dd($request);
        $saveEdit = Service::findorFail($request->editService[0]['id'])->update([
        'title' => $request->editService[0]['title'],
        'date' => $request->editService[0]['date'],
        'details' => $request->editService[0]['details']
        ]);
        return response()->json([
            'message' => 'Service Updated !!!'
        ]);
    }
}

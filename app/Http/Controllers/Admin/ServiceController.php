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
        $saveEdit = Service::findorFail($request->editService[0]['id'])->get();
        $saveEdit->title = $request->editService[0]['title'];
        $saveEdit->date = $request->editService[0]['date'];
        $saveEdit->details = $request->editService[0]['details'];
        $saveEdit->update();
        return response()->json([
            'message' => 'Service Updated !!!'
        ]);
    }
}

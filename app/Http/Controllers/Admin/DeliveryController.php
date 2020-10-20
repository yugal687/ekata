<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DeliveryAddress;
use App\Model\PostalCode;
use App\Model\State;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function createState(Request $request)
    {
        //dd($request);
        $validate = $request->validate([
            'state' => 'required'
        ]);
        if ($validate) {
            State::create([
                'state' => $request->state
            ]);
            return response()->json([
                'message' => 'Stated added sucessfully !!'
            ]);
        }
    }
    public function updateState(Request $request)
    {
        //dd($request);
        $validate = $request->validate([
            'state' => 'required'
        ]);
        if ($validate) {
            State::where('id',$request->id)->update([
                'state' => $request->state
            ]);
            return response()->json([
                'message' => 'Stated added sucessfully !!'
            ]);
        }
    }

    public function updatePostal(Request $request)
    {
        $validate = $request->validate([
            'postal_code' => 'required'
        ]);
        if ($validate) {
            PostalCode::where('id',$request->id)->update([
                'postal_code' => $request->postal_code
            ]);
            return response()->json([
                'message' => 'Postal code added sucessfully !!'
            ]);
        }
    }
    public function createPostal(Request $request)
    {
        $validate = $request->validate([
            'postal_code' => 'required'
        ]);
        if ($validate) {
            PostalCode::create([
                'postal_code' => $request->postal_code
            ]);
            return response()->json([
                'message' => 'Postal code added sucessfully !!'
            ]);
        }
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            "postal_code_id" => 'required',
            "state_id" => 'required',
            "delivery_charge" => 'required'
        ]);
        if ($validate) {
            DeliveryAddress::create([
                "postal_code_id" => $request->postal_code_id,
                "state_id" => $request->state_id,
                "delivery_charge" => $request->delivery_charge
            ]);
            return response()->json([
                'message' => 'Delivery Details added sucessfully!!'
            ]);
        }

    }

    public function fetch()
    {
        $deliveryDetails = DeliveryAddress::with('state','postCode')->get();
        return response()->json([
            'delivery' => $deliveryDetails
        ]);
    }

    public function fetchState()
    {
        $state = State::all();
        return response()->json([
            'state' => $state
        ]);
    }

    public function fetchPostal()
    {
        $postal = PostalCode::all();
        return response()->json([
            'postal' => $postal
        ]);
    }

    public function delete($id)
    {
        $delete = DeliveryAddress::where('id', $id)->delete();
        return response()->json([
            'message' => 'Sucessfully Deleted !!'
        ]);
    }

    public function deleteState($id)
    {
        State::where('id', $id)->delete();
        return response()->json([
            'message' => 'Sucessfully Deleted !!'
        ]);
    }

    public function deletePostal($id)
    {
        PostalCode::where('id', $id)->delete();
        return response()->json([
            'message' => 'Sucessfully Deleted !!'
        ]);
    }

    public function update(Request $request)
    {
       // dd($request);
        $validate = $request->validate([
            "postal_code_id" => 'required',
            "state_id" => 'required',
            "delivery_charge" => 'required'
        ]);
        if ($validate) {
            $postalId=PostalCode::where('postal_code',$request->postal_code_id)->get();
            $stateId=State::where('state',$request->state_id)->get();
//dd($postalId);
            DeliveryAddress::where('id',$request->id)->update([
                "postal_code_id" => $postalId[0]->id,
                "state_id" => $stateId[0]->id,
                "delivery_charge" => $request->delivery_charge
            ]);
            return response()->json([
                'message' => 'Delivery Details Updated Sucessfully !!!'
            ]);
        }
    }
}

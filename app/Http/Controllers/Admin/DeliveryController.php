<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\StatePostalCode;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function create(Request $request)
    {
        $validate = $request->validate([
            "postal_code_id" => 'required',
            "state_id" => 'required',
            "delivery_charge" => 'validate'
        ]);
        if ($validate) {
            StatePostalCode::create([
                "postal_code_id"=>$request->postal_code_id,
                "state_id" => $request->state_id,
                "delivery_charge" =>$request->delivery_charge
            ]);
            return response()->json([
                'message' => 'Delivery Details added sucessfully!!'
            ]);
        }

    }
    public function fetch(){
        $deliveryDetails=StatePostalCode::all();
        return response()->json([
           'delivery' => $deliveryDetails
        ]);
    }
    public function delete($id){
        $delete = StatePostalCode::where('id',$id)->delete();
        return response()->json([
           'message' => 'Sucessfully Deleted !!'
        ]);
    }
    public function update(Request $request){
        StatePostalCode::where('id',$request->id)->update([
            "postal_code_id"=>$request->postal_code_id,
            "state_id" => $request->state_id,
            "delivery_charge" =>$request->delivery_charge
        ]);
        return response()->json([
           'message'=>'Delivery Details Updated Sucessfully !!!'
        ]);
    }
}

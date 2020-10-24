<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PaymentCredential;
use App\Service\Payment\PaymentCredentialRepo;
use Illuminate\Http\Request;

class PaymentCredentialsController extends Controller
{
    public function create(Request $request)
    {
        $validate = $request->validate([
            "payment_type" => 'required',
            "secret_key" => 'required',
            "api_key" => 'required'
        ]);
        if ($validate) {
            PaymentCredential::create([
                "payment_type" => $request->payment_type,
                "secret_key" => $request->secret_key,
                "api_key" => $request->api_key
            ]);
            return response()->json([
                'message' => 'Payment Credential added sucessfully !!!'
            ]);
        }

    }

    public function fetch()
    {
        $credentials = PaymentCredential::all();
        return response()->json([
            'credentials' => $credentials
        ]);
    }

    public function delete($id)
    {
        PaymentCredential::where('id', $id)->delete();
        return response()->json([
            'message' => 'Payment Credential Deleted !!'
        ]);
    }

    public function update(Request $request)
    {
        //dd($request);
        $validate = $request->validate([
            "payment_type" => 'required',
            "secret_key" => 'required',
            "api_key" => 'required',
        ]);
        if ($validate) {
            PaymentCredential::where('id', $request->id)->update([
                "payment_type" => $request->payment_type,
                "secret_key" => $request->secret_key,
                "api_key" => $request->api_key
            ]);
            return response()->json([
                'message' => 'Payment Credentials Updated !!!'
            ]);
        }
    }

    public function paypalCredential(PaymentCredentialRepo $paymentCredentialRepo)
    {
        $paypalCredential = $paymentCredentialRepo->paypalCredential();
        return response()->json([
            'paypalClientId' => $paypalCredential->api_key
        ]);


    }

}

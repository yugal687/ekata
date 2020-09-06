<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentCheckoutRequest;
use App\Service\Order;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{

    public function paypalCheckOut(Request $request)
    {
        //dd($request->orderItems[0]);
        if ($this->validateState($request->shippingAddress,
            $request->billingAddress)) {
            $data = [];
            $data['items'] = array_map(function ($orderItems) {
                return [
                    'name' => $orderItems['product_name'],
                    'price' => 1.0,
                    'qty' => $orderItems['quantity'],
                    'desc' => $orderItems['quantity'] . ' ' . $orderItems['product_name'],
                ];
            }, $request->orderItems);

            $data['invoice_id'] = uniqid();
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = route('payment.success');
            $data['cancel_url'] = route('payment.cancel');
            $data['total'] = 2.0;

            $provider = new PayPalClient;

            //        dd($data);

            //$provider = new PayPalClient();

            /*PayPal::setProvider();

            $response = $provider->setExpressCheckout($data);
            */
            //dd($response);


            //if paymentSucessfull
            $order = new Order($data['items'],
                $data['invoice_id'],
                $request->billingAddress,
                $request->shippingAddress,
                $request->totalPrice);

            return response()->json([
                'msg' => 'sucessfully saved Order ',
                'invoice_id' => '#' . $data['invoice_id'],
            ]);
        }
        return response()->json([
            'msg' => 'Something went wrong',
        ]);

    }

    public function validateState($shippingAddress, $billingAddress)
    {
        if (isset($shippingAddress['email'])) {
            if ($shippingAddress['state'] == 'NSW') {
                return true;
            }
        } elseif (isset($billingAddress['email'])) {
            if ($billingAddress['state'] == 'NSW') {
                return true;
            }
        }
        return false;

    }
}

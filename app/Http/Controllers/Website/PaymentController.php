<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentCheckoutRequest;
use App\Mail\OrderMail;
use App\Service\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{

    public function paypalCheckOut(Request $request)
    {
        dd($request);
        if ($this->validateState($request->shippingAddress,
            $request->billingAddress)) {
            $data = [];

            //map items into corresponding paypal api
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

            //$provider = new PayPalClient();
            /*PayPal::setProvider();
            $response = $provider->setExpressCheckout($data);
            */
            //dd($response);


            //if paymentSucessfull

            $order = new Order();
                $order->order_number = $data['invoice_id'];
            $order->shipping_address = $request->shippingAddress;
            $order->sub_urb =$request->sub_urb;
            $order->state = $request->state;
            $order->order_status = $request->order_status;
            $order->postal_code = $request->postal_code;
            $order->total_price = $request->totalPrice;
            $order->save();
            //send maile here;///send mail  here
            //Mail section starts here after succesfully order is saved;
            Mail::to(Auth::user()->email)->send(new OrderMail());
            Mail::to('ajitsubedi2011@gmail.com') ->send(new OrderMail());
            //
            //
            //
            //
            //Mail Section ends

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

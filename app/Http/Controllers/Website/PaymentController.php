<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Service\OrderService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\ExpressCheckout;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;

class PaymentController extends Controller
{

    public function paypalCheckOut(Request $request)
    {
        if ($this->validateState($request->shippingAddress,
            $request->billingAddress)) {
            $data = [];

            //map items into corresponding paypal api
            $data['items'] = $this->maporderItems($request->orderItems);
            $data['invoice_id'] = uniqid();
            $order = new OrderService($data['items'], $data['invoice_id'], $request->billingAddress, $request->shippingAddress, $request->totalPrice);

            //send maile here;///send mail  here
            //Mail section starts here after succesfully order is saved;
            //
            //
            //
            //
            //
            //
            //Maile Section ends

            return response()->json([
                'msg' => 'sucessfully saved Order ',
                'invoice_id' => '#' . $data['invoice_id'],
                'address' => $request->shippingAddress['address'] ?? $request->billingAddress['address'],
                'suburb' => $request->shippingAddress['suburb'] ?? $request->billingAddress['suburb'],
                'state' => $request->shippingAddress['state'] ?? $request->billingAddress['state'],
                'postal_code' => $request->shippingAddress['postal_code'] ?? $request->billingAddress['postal_code'],
            ]);
        }
        return response()->json([
            'msg' => 'Something went wrong',
        ]);

    }

    //payment using stripe
    public function stripeCheckOut(Request $request)
    {
        if ($this->validateState($request->shippingAddress,
            $request->billingAddress)) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
//            create this in interface
            try {
                $token = Token::create([
                    "card" => [
                        "number" => $request->card['card_number'],
                        "exp_month" => $request->card['expiry_month'],
                        "exp_year" => $request->card['expiry_year'],
                        "cvc" => $request->card['cvv'],
                    ]
                ]);
                $charge = Charge::create([
                    "amount" => floatval($request->totalPrice) * 100,
                    "currency" => "AUD",
                    "source" => $token, // obtained with Stripe.js
                    "description" => 'this is test',
                    "receipt_email" => Auth::user()->email,
                ]);
            } catch (\Exception $e) {
                return response()->json($e->getJsonBody());
            }

            $data['items'] = $this->maporderItems($request->orderItems);
            $data['invoice_id'] = uniqid();
            $order = new OrderService($data['items'], $data['invoice_id'], $request->billingAddress, $request->shippingAddress, $request->totalPrice);
            //send maile here;///send mail  here
            //Mail section starts here after succesfully order is saved;
            //
            //
            //
            //
            //
            //
            //
            //Maile Section ends

            return response()->json([
                'msg' => 'sucessfully saved Order ',
                'invoice_id' => '#' . $data['invoice_id'],
                'address' => $request->shippingAddress['address'] ?? $request->billingAddress['address'],
                'suburb' => $request->shippingAddress['suburb'] ?? $request->billingAddress['suburb'],
                'state' => $request->shippingAddress['state'] ?? $request->billingAddress['state'],
                'postal_code' => $request->shippingAddress['postal_code'] ?? $request->billingAddress['postal_code'],
            ]);
        }

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

    public function maporderItems(array $orderItems)
    {
        return array_map(function ($orderItems) {
            return [
                'product_id' => $orderItems['product_id'],
                'price' => $orderItems['price'] / $orderItems['quantity'],
                'discount' => 0,
                'quantity' => $orderItems['quantity'],
                'user_id' => Auth::user()->id,
                'date' => Carbon::now()->toDateString(),
            ];
        }, $orderItems);

    }


    public function paymentsuccess(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            {
                Session::flash('msg', "success");
                return redirect('/billings');
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Service\OrderService;
use App\Service\Payment\PaymentCredentialRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;

//use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
    private $paymentCredentialRepo;

    public function __construct(PaymentCredentialRepo $paymentCredentialRepo)
    {
        $this->paymentCredentialRepo = $paymentCredentialRepo;
    }

    public function paypalCheckOut(Request $request)
    {
        if ($this->validateState($request->shippingAddress,
            $request->billingAddress)) {
            $data = [];
            $data['invoice_id'] = uniqid();
            $data['items'] = $this->maporderItems($request->orderItems);
            //map items into corresponding paypal api
            $order = new OrderService($data['items'],
                $data['invoice_id'],
                $request->billingAddress,
                $request->shippingAddress,
                $request->totalPrice,
                'Paypal');
            if ($order) {
                $userDetail = $request->shippingAddress['email'] ? $request->shippingAddress : $request->billingAddress;
               /* $productName = Product::where('id',$data['items']['product_id'])->get();
                dd($productName);
                               Mail::to($request->shippingAddress['email'] ?? $request->billingAddress['email'])
                                    ->send(new OrderMail($userDetail, $request->totalPrice,$data,$productName));*/
            }
            return response()->json([
                'successMsg' => 'Congratulations! Your order was successfully placed ',
                'invoice_id' => '#' . $data['invoice_id'],
                'address' => $request->shippingAddress['address'] ?? $request->billingAddress['address'],
                'suburb' => $request->shippingAddress['suburb'] ?? $request->billingAddress['suburb'],
                'state' => $request->shippingAddress['state'] ?? $request->billingAddress['state'],
                'postal_code' => $request->shippingAddress['postal_code'] ?? $request->billingAddress['postal_code'],
            ]);
        }
        return response()->json([
            'errorMsg' => 'Sorry! Something went wrong',
        ]);

    }

    //payment using stripe
    public function stripeCheckOut(Request $request)
    {
        //get all stripeCredential from db
        $stripeSecret = $this->paymentCredentialRepo->stripeCredential();
        if ($this->validateState($request->shippingAddress, $request->billingAddress)) {
            Stripe::setApiKey($stripeSecret->secret_key);

            //  Stripe::setApiKey(env('STRIPE_SECRET'));
//            create this in
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
                    "description" => 'this is test', //change this to appropriate description
                    "receipt_email" => $request->shippingAddress['email'] ?? $request->billingAddress['email'],
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getJsonBody()['error']]);
            }

            $data['items'] = $this->maporderItems($request->orderItems);
            $data['invoice_id'] = uniqid();
            $order = new OrderService($data['items'],
                $data['invoice_id'],
                $request->billingAddress,
                $request->shippingAddress,
                $request->totalPrice,
                'Master Card');
            if ($order) {
                $userDetail = $request->shippingAddress['email'] ? $request->shippingAddress : $request->billingAddress;
                //dd($userDetail);
              /*  $productName = Product::where('id',$data['items']['product_id'])->get();
                Mail::to($request->shippingAddress['email'] ?? $request->billingAddress['email'])
                                    ->send(new OrderMail($userDetail, $request->totalPrice,$data));*/
            }
            return response()->json([
                'msg' => 'Successfully saved order ',
                'invoice_id' => '#' . $data['invoice_id'],
                'name' => $request->shippingAddress['first_name'] ?? $request->billingAddress['first_name'],
                'address' => $request->shippingAddress['address'] ?? $request->billingAddress['address'],
                'suburb' => $request->shippingAddress['suburb'] ?? $request->billingAddress['suburb'],
                'state' => $request->shippingAddress['state'] ?? $request->billingAddress['state'],
                'postal_code' => $request->shippingAddress['postal_code'] ?? $request->billingAddress['postal_code'],
            ]);
        }

    }

/*public  function  ordeasasd($data, $paymentType, $shipingAddress, $billingAddress){

}*/

    public function cashOnDeliveryCheckOut(Request $request)
    {
        if ($this->validateState($request->shippingAddress, $request->billingAddress)) {
//                    $this->ordeasasd($request->orderItems, 'cash on delivery');

            $data['items'] = $this->maporderItems($request->orderItems);
            $data['invoice_id'] = uniqid();
            $order = new OrderService($data['items'], $data['invoice_id'],
                $request->billingAddress,
                $request->shippingAddress,
                $request->totalPrice,
                'cash on delivery');
            if ($order) {
                /* $userDetail = $request->shippingAddress['email'] ? $request->shippingAddress : $request->billingAddress;
                 dd($data->items);
                 Mail::to($request->shippingAddress['email'] ?? $request->billingAddress['email'])
                                     ->send(new OrderMail($userDetail, $request->totalPrice,$data));
             */
            }
            return response()->json([
                'msg' => 'Successfully saved order ',
                'invoice_id' => '#' . $data['invoice_id'],
                'name' => $request->shippingAddress['first_name'] ?? $request->billingAddress['first_name'],
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

    public function validatePostalCode()
    {
        //keep 1 as there is only NSW;
    }


    public function maporderItems(array $orderItems)
    {
        return array_map(function ($orderItems) {
            return [
                'product_id' => $orderItems['product_id'],
                'price' => $orderItems['price'] / $orderItems['quantity'],
                'discount' => 0,
                'quantity' => $orderItems['quantity'],
                'user_id' => Auth::user()->id ?? null,
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

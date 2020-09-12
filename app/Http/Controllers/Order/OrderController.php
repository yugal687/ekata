<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function saveOrder(Request $request)
    {
        $validate = $request->validate([
            'price' => $request->price,
            'quantity' => $request->quantity,
            'discount' => $request->discount,
        ]);
        if ($validate) {
            $fetchorder = Order::latest()->first();
            $saveOrder = new Order();
            if ($fetchorder) {
                $part = $fetchorder->order_number;
                $saveOrder->order_number = $part + 1;
            } else {
                $saveOrder->order_number = '111';
            }
            $saveOrder->shipping_address = $request->shipping_address;
            $saveOrder->sub_urb =$request->sub_urb;
            $saveOrder->state = $request->state;
            $saveOrder->order_status = $request->order_status;
            $saveOrder->postal_code = $request->postal_code;
            $saveOrder->total_price = $request->total_price;
            $saveOrder->save();

            $saveOrderDetails = OrderDetail::create([
                'order_id' => $saveOrder->id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'discount' => $request->discount,
                'order_status' => $request->order_status,
                'user_id' => Auth::id(),
                'date' => $request->date
            ]);

            Mail::to(Auth::user()->email)->send(new OrderMail());
            Mail::to('ajitsubedi2011@gmail.com') ->send(new OrderMail());
        }
    }
    public function getOrder(){
        $order = OrderDetail::with('order','user','product')->get();

        return response()->json([
           'order' => $order
        ]);
    }
}

<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                $saveOrder->order_number = '001';
            }
            $saveOrder->total_price = $request->total_price;
            $saveOrder->save();

            $saveOrderDetails = OrderDetail::create([
                'order_id' => $saveOrder->id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'discount' => $request->discount,
                'order_status' => $request->order_status,
                'user_id' => Auth::user()->id,
                'date' => $request->date
            ]);
        }
    }
    public function getOrder(){
        $order = OrderDetail::with('order')->get();

        return response()->json([
           'order' => $order
        ]);
    }
}

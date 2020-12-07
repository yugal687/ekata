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
    public function getOrder(){
        $order = OrderDetail::with('order','user','product')->orderBy('created_at', 'desc')->get();
        $orderlisted = Order::with(['items'=>function($q){
            $q->with('product')->get();
        }])->orderBy('created_at', 'desc')->get();
        return response()->json([
           'order' => $order,
            'orderlisted' =>$orderlisted
        ]);
    }
    public function setDelivered($id){
        $delivered = Order::where('id',$id)->update([
            'order_status' => 'delivered'
        ]);
        /*dd($delivered[0]->order);
        $delivered[0]->order->order_status = 'delivered';
        //dd($delivered[0]);
        $delivered[0]->order->save();*/
        return response()->json([
           'message' => 'Order Delivered !!!'
        ]);
    }
    public function deleteOrder($id){
        $delivered = Order::where('id',$id)->update([
            'order_status' => 'failed'
        ]);
       /* //dd($delivered[0]);
        $delivered[0]->order->order_status = 'failed';
        //dd($delivered[0]);
        $delivered[0]->order->save();*/
        return response()->json([
            'message' => 'Order Failed !!!'
        ]);
    }
}

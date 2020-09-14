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
        $order = OrderDetail::with('order','user','product')->get();

        return response()->json([
           'order' => $order
        ]);
    }
    public function setDelivered($id){
        $delivered = OrderDetail::where('id',$id)->with('order','user','product')->get();
        //dd($delivered[0]);
        $delivered[0]->order->order_status = 'delivered';
        //dd($delivered[0]);
        $delivered[0]->order->save();
        return response()->json([
           'message' => 'Order Delivered !!!'
        ]);
    }
    public function deleteOrder($id){
        $deleteOrder = OrderDetail::findorFail($id)->delete();
        return response()->json([
           'message' => 'Order Deleted Sucessfully !!'
        ]);
    }
}

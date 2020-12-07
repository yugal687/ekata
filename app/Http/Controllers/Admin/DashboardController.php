<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboradData(){
        $countUser = User::where('role_id',2)->count();
        //dd($countUser);
        $countProduct = Product::count();
        $countOrder = OrderDetail::count();
        $orderlisted = Order::with(['items'=>function($q){
            $q->with('product')->get();
        }])->orderBy('created_at', 'desc')->get();
        $latestOrder = OrderDetail::with('order','user','product')
            ->orderBy('id', 'DESC')
            ->get();
        $recentlyAddedProducts = Product::with(array('category', 'brand', 'tags', 'image'))->latest()->get();
        return view('Admin.dashboard',[
            'orderlisted' =>$orderlisted,
           'countUser' => $countUser,
           'countOrder' => $countOrder,
           'latestOrder' => $latestOrder,
           'recentProduct' => $recentlyAddedProducts,
            'countProduct' => $countProduct
        ]);
    }
    public function fetchAdmin(){
        $Admins = User::where('role_id',1)->get();
        return response()->json([
            'allAdmins' =>$Admins
        ]);
    }
}

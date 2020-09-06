<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\OrderDetail;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboradData(){
        $countUser = User::count();
        //dd($countUser);
        $countOrder = OrderDetail::count();
        $latestOrder = OrderDetail::with('order','user','product')
            ->orderBy('id', 'DESC')
            ->get();
        $recentlyAddedProducts = Product::with(array('category', 'brand', 'tags', 'image'))->latest()->get();
        return view('Admin.dashboard',[
           'countUser' => $countUser,
           'countOrder' => $countOrder,
           'latestOrder' => $latestOrder,
           'recentProduct' => $recentlyAddedProducts
        ]);
    }
}

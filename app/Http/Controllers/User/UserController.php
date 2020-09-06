<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\OrderDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function singleUserDetail()
    {
        if (Auth::user()) {
            $userid = Auth::id();
            $userDetail = User::where('id', $userid)->get();
            //dd($userDetail);
            return response()->json([
                'UserDetail' => $userDetail
            ]);
        }

    }

    public function updateUser(Request $request)
    {
        $user = Auth::user();
        //dd($request);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->update();
    }

    public function recentOrder()
    {
        $lastOrder = OrderDetail::where('user_id', Auth::id())->first();
        return response()->json([
            'recentOrder' => $lastOrder
        ]);
    }

    public function userBillingDetails()
    {
        if ($user = Auth::user()) {
            $userDetails = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'address' => $user->address,
                'suburb' => $user->suburb,
                'state' => $user->state,
                'postal_code' => $user->postal_code,
                'email' => $user->email,
                'contact_number' => $user->contact_number,
            ];

            return response()->json([
                'userBillingDetails' => $userDetails,
            ]);
        }
        return false;
    }

}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\OrderDetail;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerUser(Request $request){
        $user = Role::where('id','=',2)->get();
        $register = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'contact_number' => $request->input('contact_number'),
            'sub_urb' => $request->input('sub_urb'),
            'state' => $request->input('state'),
            'postal_code' => $request->input('postal_code'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' =>2
        ]);
    }
    public function singleUserDetail(){

            $userDetail = Auth::user();
            //dd($userDetail);
            return response()->json([
                'userDetail' => $userDetail
            ]);
    }
    public function updateUser(Request $request){
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
    public function recentOrder(){
    $lastOrder = OrderDetail::with('order','user','product')
        ->where('user_id',Auth::id())
        ->orderBy('id', 'DESC')
        ->get();
    //dd($lastOrder);
    return view('User.userdashboard',[
       'recentOrder' => $lastOrder
    ]);
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

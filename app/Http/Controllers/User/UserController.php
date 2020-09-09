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
    public function updateUser(Request $request){
        //dd($request);

        $editeduserDetail = json_decode($request->userDetail);
        $user = User::findorFail($editeduserDetail->id)->update([
            'first_name' => $editeduserDetail->first_name,
            'last_name' => $editeduserDetail->last_name,
            'address' => $editeduserDetail->address,
            'contact_number' => $editeduserDetail->contact_number,
            'sub_urb' => $editeduserDetail->sub_urb,
            'state' => $editeduserDetail->state,
            'postal_code' => $editeduserDetail->postal_code,
            'email' => $editeduserDetail->email,
        ]);
        return response()->json([
            'message' => 'User Profile Updated !!!'
        ]);

    }
    public function registerUser(Request $request){
        //dd($request);
        $validate =$request->validate([
            'email' => 'email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        if ($validate) {
            $registerUser = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'address' => $request->input('address'),
                'contact_number' => $request->input('contact_number'),
                'sub_urb' => $request->input('sub_urb'),
                'state' => $request->input('state'),
                'postal_code' => $request->input('postal_code'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => 2
            ]);
        }
        if ($registerUser) {
            return route('/login');
        }
    }
    public function registerAdmin(Request $request){
        $registerAdmin = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'contact_number' => $request->input('contact_number'),
            'sub_urb' => $request->input('sub_urb'),
            'state' => $request->input('state'),
            'postal_code' => $request->input('postal_code'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' =>1
        ]);
        return view('auth.login');
    }
    public function singleUserDetail(){

            $userDetail = Auth::user();
            //dd($userDetail);
            return response()->json([
                'userDetail' => $userDetail
            ]);
    }
    public function recentOrder()
    {
        $lastOrder = OrderDetail::with('order', 'user', 'product')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'DESC')
            ->get();
        //dd($lastOrder);
        return view('User.userdashboard', [
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

    public function fetchUsers(){
        $Users = User::where('role_id',2)->get();
        return response()->json([
           'allUsers' =>$Users
        ]);
    }
    public function deleteUser($id){
        $deleteUser = User::findorFail($id)->delete();
        return response()->json([
           'message' => "User Deleted !!!"
        ]);
    }

}

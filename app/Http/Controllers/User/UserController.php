<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
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

    public function registerUser(Request $request)
    {
        //dd($request);
        $validate = $request->validate([
            'email' => 'email|unique:users',
            'password' => 'required|min:6|confirmed',
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
            //dd($registerUser);
        }
        if ($registerUser) {
            return view('auth.login');
        }
    }

    public function registerAdmin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validate) {
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
                'role_id' => 1
            ]);
        }
        if ($registerAdmin) {
            return view('Admin.User.users');
        }
    }

    public function singleUserDetail()
    {
        if (Auth::check()) {
            $userDetail = Auth::user();
            //dd($userDetail);
            return response()->json([
                'userDetail' => $userDetail
            ]);
        }

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

    public function fetchUsers()
    {
        $Users = User::where('role_id', 2)->get();
        return response()->json([
            'allUsers' => $Users
        ]);
    }

    public function deleteUser($id)
    {
        $deleteUser = User::findorFail($id)->delete();
        return response()->json([
            'message' => "User Deleted !!!"
        ]);
    }

    public function dashboradData()
    {
//        $latestOrder = OrderDetail::with('order', 'user', 'product')->orderBy('id', 'DESC')->get();
        $latestOrder = OrderDetail::with('order', 'user', 'product')->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('User.userdashboard', [
            'latestOrder' => $latestOrder
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ]);
        if ($validate) {
            //dd($request->currentPassword);
            if (Hash::check($request->currentPassword, Auth::user()->password)) {
                $users = User::findorFail(Auth::user()->id);
                $users->password = Hash::make($request->newPassword);
                $users->update();
            }
        }
        if ($users) {
            return response()->json([
                'message' => 'Password Updated !!!'
            ]);
        }
    }

}

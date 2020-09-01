<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function singleUserDetail(){
        $userDetail = Auth::user();
        //dd($userDetail);
        return view('user.userprofile',[
           'UserDetail' => $userDetail
        ]);
    }
    public function updateUser($id){
        $saveupdatedUser = User::findorfail($id)->update([

        ]);
    }
}

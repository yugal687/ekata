<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

 /*
    // protected $redirectTo = RouteServiceProvider::AdminHOME;

    public function redirectTo()
    {
//        dd(Auth::user()->role->role);
        $role = Auth::user()->role->role;
        switch ($role) {
            case 'admin':
                return '/admin/dashboard';
                break;
            case 'user':
                return '/user/userdashboard';
                break;
            default:
                return '/login';
                break;
        }

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public
    function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

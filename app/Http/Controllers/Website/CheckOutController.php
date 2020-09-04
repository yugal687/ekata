<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{

    public function checkOut()
    {
        if (!Auth::user()->id) {
            return json()->response([
                'msg' => 'Please login at first'
            ]);

        }
    }

}

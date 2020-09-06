<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function saveFeedback(Request $request){
        $saveFeedback = Feedback::create([
            'user_id' =>Auth::user(),
            'star' => $request->rating,
            'feedback' => $request->feedback
        ]);
    }
    public function fetchFeedback(){
        $feedback = Feedback::with('user')->get();
        return response()->json([
           'feedback' => $feedback
        ]);
    }
    public function deleteFeedback($id){
        $deleteFeedback = Feedback::findorFail($id)->delete();
        return response()->json([
           'message' => 'FeedBack Delleted !!!!'
        ]);
    }
}

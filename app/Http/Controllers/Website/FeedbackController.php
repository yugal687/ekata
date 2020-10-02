<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function saveFeedback(Request $request)
    {
        if (Auth::user()) {
            $saveFeedback = Feedback::create([
                'user_id' => Auth::user()->id,
                'star' => $request->rating,
                'feedback' => $request->feedback
            ]);
        }
        $saveFeedback = Feedback::create([
            'star' => $request->rating,
            'feedback' => $request->feedback
        ]);
        return response()->json(['success'=>'Feedback is submitted successfully']);
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
           'message' => 'FeedBack Deleted !!!!'
        ]);
    }
}

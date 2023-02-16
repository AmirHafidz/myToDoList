<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use App\Notifications\SendFeedback;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function store(Request $request){

        $admin = User::where('isAdmin',true)->get();
        $feedback_sent_by = User::find($request->user_id);

        $validators  = Validator::make($request->all(),[
            'feedback_title' => 'required',
            'feedback_comment' => 'required',
        ]);

        if($validators->fails()){
            return response()->json([
                'message' => $validators->errors()->messages(),
                'error' => $validators->errors()->all(),
                'status' => 422
            ]);
        }else{
            $feedback = new Feedback();
            $feedback->user_id = $request->user_id;
            $feedback->feedback_ux = $request->feedback_ux;
            $feedback->feedback_ui = $request->feedback_ui;
            $feedback->feedback_functionality = $request->feedback_functionality;
            $feedback->name = $request->feedback_title;
            $feedback->comment = $request->feedback_comment;
            $feedback->save();

            Notification::send($admin,new SendFeedback($feedback_sent_by->name,$feedback->name,$feedback->id));

            return response()->json([
                'message' => 'Feedback successfully be sent !',
                'status' => 200
            ]);
        }
            
    }

    public function fetch(Request $request,$user_id,$feedback_id){
        if($user_id == 1){
            $feedback = Feedback::find($feedback_id);
            return response()->json([
                'status' => 200,
                'feedback' => $feedback
            ]);
        }else{
            return response()->json([
                'message' => 'You did not have access for this action !',
            ],403);
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarkAsRead extends Controller
{
    public function index(Request $request){
        $user = Auth()->user();
        foreach($user->unreadNotifications as $notification){
            if($notification->id == $request->id){
                $notification->markAsread();
            }
        }
        return response()->json([
            'message' => "Success"
        ],200);
    }
}

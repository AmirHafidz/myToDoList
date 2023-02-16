<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function dashboard(){
        
        if(Auth()->user()){
            $user = Auth()->user();
        }
        else{
            return redirect()->route('home.index');
        }

        $fetch_tasks = Http::get('http://todolist.test/api/show-all-task/'.$user->id);
        $tasks = $fetch_tasks->json();
        
        return view('dashboard.index',compact('user','tasks'));

    }

    public function add_task(){

        if(Auth()->user()){
            $user = Auth()->user();
        }
        else{
            return redirect()->route('home.index');
        }

        return view('add_task.index',compact('user'));
    }
}

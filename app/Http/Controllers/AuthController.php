<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function view_register(Request $request){
        return view('register.index');
    }

    public function register(Request $request){

        // $data_register = [
        //     'name'=> $request->register_name,
        //     'email'=> $request->register_name,
        //     'password'=> $request->register_name,
        // ];

        // $new_user = User::create($data_register);
        
        $admin = User::where('isAdmin',true)->get();
        $new_user = new User;
        $new_user->name =$request->register_name;
        $new_user->email = $request->register_email;
        $new_user->password =Hash::make($request->register_password);
        $new_user->save();

        Auth::login($new_user);
        Notification::send($admin,new UserRegister($request->register_name));
        return response()->json([
            'message' => 'Welcome on board !'
        ],200);

    }

    public function login(Request $request){

        $this->validate($request,[
            'login_email' => 'required',
            'login_password' => 'required',
        ]);

        $credential = [
            'email' => $request->login_email,
            'password' => $request->login_password,
        ];

        if(Auth::attempt($credential)){
            return redirect()->route('user.dashboard');
            // $user = Auth()->user();
            // return view('dashboard.index2',compact('user'));
        }
        else{
            // return redirect()->back();
            return redirect()->back()->with('login_failed', 'Oops..you insert wrong credential !');   
        }
    }

    public function logout(){
        Session()->flush();
        Auth()->logout();
        return redirect()->route('home.index');
    }

}

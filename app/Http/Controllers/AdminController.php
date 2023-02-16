<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function view_list_user(){
        $user = Auth()->user();
        return view('dashboard.admin.list_user.index',compact('user'));
    }

    public function list_user(Request $request){

        $user_list = User::select('id','name','email')->get();

        if($request->ajax()){
            return DataTables::of($user_list)->addIndexColumn()->addColumn('actions',function($row){
                $btn = '<button class="btn btn-light text-dark my-primary-font">View</button>
                        <button class="btn btn-light text-dark my-primary-font">Notify</button>';
                return $btn;
            })->rawColumns(['actions'])->make(true);
        }

    }
}

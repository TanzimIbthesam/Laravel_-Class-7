<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $users=User::all();
       
        return view('home',compact('users'));
        // echo Auth::user()->id;
        // echo Auth::id(),"<br>";
        //If we dont want to fetch id of user with loggedin id
        // $user_id=Auth::id();
        // $users=User::where('id','!=',$user_id)->get(); 
        // return view('home',compact('users'));       
       
    }
}

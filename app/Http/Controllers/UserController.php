<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\user_model;
use App\Redirect;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userregister');
    }
    public function insertuser(Request $request)
    {
       
     
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        
        $user = new user_model();
        $user->name = $username;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
       $user->save();
    }
}

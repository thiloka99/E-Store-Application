<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('index');
    }
    function registerLogin()
    {
        return view('register');
    }
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if(Auth::attempt($user_data))
        {
            if(Auth::user()->role == 'admin')
                return view('dashboard.admin');
            else if(Auth::user()->role == 'employee')
                return view('dashboard.employee');
            else if(Auth::user()->role == 'customer')
                return view('dashboard.customer'); 
            
        }
        else{
            return back()->with('error','Wrong Login Details');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

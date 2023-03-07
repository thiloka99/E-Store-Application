<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= User::all()->where('role', 'employee');
        return view('employeef.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employeef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'mobile' => $request->get('mobile'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password')),
            'remember_token' => Str::random(10)
        ]);
        $user->save();
        
        /*$user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if($request->get('role') == 'customer') {
            if(Auth::attempt($user_data))
            {
               return view('dashboard.customer'); 
            }
        } else {
           return redirect()->route('users.index');
        }*/

        if($request->get('role')=='customer'){
            return view('index')->with('success','New Customer has been added successfully');
        }
        else{
            return redirect()->route('users.index')->with('success','New Employee has been created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('employeef.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('employeef.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $ordern = Order::where('employee_id',$user->id);
        $ordern->delete();
        ////////////////////////////////////////////////////////////////////
        
        $user->delete();
        return redirect()->route('users.index');
    }
}

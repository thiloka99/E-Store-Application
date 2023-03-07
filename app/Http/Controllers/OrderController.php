<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        return view('ordersf.placeorder', compact('products'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('orders.placeorder');
    }
    public function showCustomerOrder() {

        $data = DB::table('orders')
        ->join('users as t1', 'orders.customer_id', '=', 't1.id')
        ->join('users as t2', 'orders.customer_id' , '=', 't2.id')
        ->select('orders.id','products.name', 'products.name', 'products.detail', 'products.price',
         't2.name as delPerson','orders.status')
        ->where('orders.customer_id', Auth::user()->id)->get();

        //$empname = User::all()->where('id')
        return view('ordersf.customerOrder', compact('data'));
    }

    public function showEmployeeOrder() {

        $data = DB::table('orders')
        ->join('users', 'orders.customer_id', '=', 'users.id')
        ->join('products', 'products.id' , '=', 'orders.product_id')
        ->select('users.name', 'users.address', 'users.mobile', 'products.name as prod_name', 'products.price',
         'products.detail','orders.created_at')
        ->where('orders.employee_id', Auth::user()->id)->get();

        //$empname = User::all()->where('id')
        return view('ordersf.show', compact('data'));

    }
    public function canceled(Request $order){
        Order::find($order->id)->update(array('status'=>'cancelled'));
        return redirect()->route('showCustomerOrder')->with('success',"Order cancelled successfully");
    }
    public function delivered(Request $order){
        Order::find($order->id)->update(array('status'=>'delivered'));
        return redirect()->route('myorder')->with('success',"Order delivered successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

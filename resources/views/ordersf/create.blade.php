@extends('dashboard.header')
@section('content')
Place Order
<form action="{{route('orders.store')}}" method="post">
@csrf
    <div>
        <strong>Product Name:</strong>
        {{$product->name}}
    </div>
    <br>
    <div>
        <strong>Product Details:</strong>
        {{$product->detail}}
    </div>
    <br>
    <div>
        <strong>Employee Name:</strong>
        <select name="employee_id" >
        @foreach ($employees as $user) {
            <option value="{{$user->id}}">{{$user->name}}</option>
        }
        @endforeach
    </select>
    </div>
    <br>
    <div>
        <strong>Price:</strong>
        {{$product->price}}
    </div>

    <input  type="hidden" value="{{Auth::user()->id}}" name="customer_id" >
    <input  type="hidden" value="{{$product->id}}" name="product_id" >
    <button type="submit" name="sub" >Order</button>

</form>
@endsection
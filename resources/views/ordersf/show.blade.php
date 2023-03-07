@extends('dashboard.header')
@section('content')
@php($i=1)
<table border="1" class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>price</th>
            <th>Customer Name</th>
            <th>Cus Address</th>
            <th>Cus Mobile No</th>
            <th>Date</th>
        </tr>

        @foreach ($data as $order)
        <tr>
            <td>{{$i++}}</td>
            <td>{{ $order->prod_name }}</td>
            <td>{{ $order->detail }}</td> 
            <td>{{ $order->price }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->mobile }}</td>  
            <td>{{ $order->created_at }}</td>
            <td>       
        
                @if($order->status === "pending")
                <form action="{{route('deliver',$order->id}}" method="post">
                    @csrf 
                    <button type="submit" name="cancel">Yes</button>
                </form>

                @else
                {{$order->status}}
                @endif
            </td>
        </tr>
        @endforeach
    </table>

@endsection

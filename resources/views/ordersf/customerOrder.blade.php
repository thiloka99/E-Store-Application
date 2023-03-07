@extends('dashboard.header')
@section('content')

<table border="1px" class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>price</th>
            <th>Delivery Person</th>
            <th>status</th>
        </tr>
        
        @foreach ($data as $order)
        <tr>
            <td>{{$i++}}</td>
            <td>{{ $order->prod_name }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->detail }}</td> 
            <td>{{ $order->price }}</td>
            <td>{{ $order->delPerson }}</td>
            <td>       
        
                @if($order->status === "pending")
                <form action="{{route('cancel',$order->id}}" method="post">
                    @csrf 
                    <button type="submit" name="cancel">Cancel Order</button>
                </form>

                @else
                {{$order->status}}
                @endif
            </td>
        </tr>
        @endforeach
    </table>

@endsection

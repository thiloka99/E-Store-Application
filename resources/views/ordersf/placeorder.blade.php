@extends('dashboard.header')
@section('content')
<table border="1" class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Price</th>
            <th >Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->price }}</td>
            <td>
                
                <a class="btn btn-info" href="{{ route('products.order', $product->id) }}">Place order</a>
    
            </td>
        </tr>
        @endforeach
    </table>
@endsection

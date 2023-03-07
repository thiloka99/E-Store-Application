@extends('dashboard.header')

@section('content')
<div>
        <div>
                <h2>Show the Details</h2>
        </div>
                <a  href="{{route('products.index')}}" class="btn btn-primary"> Back</a>
</div>
   
<div>
    <div>
         <div>
            <strong>Name:</strong>
            {{$product->name}}
        </div>
    </div>
 <div>

<div>
    <strong>Details:</strong>
         {{$product->detail}}
    </div>
</div>

<div>
    <div>
        <strong>Details:</strong>
            {{$product->price}}
        </div>
    </div>
</div>
@endsection
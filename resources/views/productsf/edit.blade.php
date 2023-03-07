@extends('dashboard.header')
@section('content')
<div>
        <div>
                <h2>Upadate a Product</h2>
            
            <div>
                <a href="{{route('products.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
   <!-- error messages --> 
   @if ($errors->any())
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
    <form action="{{route('products.update',$product->id)}}" method="post">
        @method('PUT')
        @csrf
         <div>
            <div>
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$product->name}}"  placeholder="Name">
            </div>
            <div >
                    <strong>Detail:</strong>
                    <textarea  style="height:150px" name="detail" placeholder="Detail">{{$product->detail}}</textarea>
            </div>
            <div >
                    <strong>Ptice:</strong>
                    <input type="number"  name="price" placeholder="{{$product->price}}">
            </div>
            <div>
              <button type="submit" name="sub">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
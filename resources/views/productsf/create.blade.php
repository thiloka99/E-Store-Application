@extends('dashboard.header')
@section('content')
<div>
   
            <h2>Add a new Product</h2>
      
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

   
<form action="{{route('products.store')}}" method="post">
    @csrf
     <div>
            <div>
                <strong>Name:</strong>
                <input type="text" name="name"  class="form-control" placeholder="Name">
            </div>
            <div >
                <strong>Detail:</strong>
                <textarea style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
            <div >
                <strong>Price:</strong>
                <input type="number" name="price" placeholder="price">
            </div>
        <div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
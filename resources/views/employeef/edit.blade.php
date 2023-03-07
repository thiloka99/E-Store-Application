@extends('dashboard.header')
@section('content')
<div >
       
                <h2>Upadate Employee Details</h2>
           
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
  
<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    @method('PATCH')
    <input type="text" name="name" value="{{$user->name}}"><br><br>
    <input type="text" name="email" value="{{$user->email}}"><br><br>
    <input type="text" name="gender" value="{{$user->gender}}"><br><br>
    <input type="text" name="address" value="{{$user->address}}"><br><br>
    <input type="text" name="mobile" value="{{$user->mobile}}"><br><br>
    <br>
    <button type="submit" name="btn">Update</button>
</form>
@endsection
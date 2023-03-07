@extends('dashboard.header')
@section('content')
<div>
            <h2>Add a new Employee</h2>
 
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

   
<form action="{{route('users.store')}}" method="post">
    @csrf
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="text" name="gender">
    <input type="text" name="address">
    <input type="text" name="mobile">
    <input type="hidden" name="role" value="employee">
    
    <input type="password" name="password">
    <button type="submit" name="btn">Enroll</button>
</form>
   
</form>
@endsection
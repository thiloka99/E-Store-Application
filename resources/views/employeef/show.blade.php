@extends('dashboard.header')
@section('content')
<div>
       
                <h2>Show the Details</h2>
           
            <div>
                <a href="{{route('users.index')}}"> Back</a>
            </div>
        
    </div>
   
    <div >
            <div>
                <strong>Name:</strong>
                {{$user->name}}
            </div>
            <div>
                <strong>email:</strong>
               {{$user->email}}
        </div>
            <div>
                <strong>gender:</strong>
               {{$user->gender}}
            </div>
            <div>
                <strong>address:</strong>
               {{$user->address}}
            </div>
            <div>
                <strong>mobile:</strong>
               {{$user->mobile}}
            </div>
    </div>
@endsection
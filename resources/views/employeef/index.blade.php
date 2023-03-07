
@extends('dashboard.header')
 <!--defines a section of content-->
@section('content')
    <div>
                <a class="btn btn-success" href="{{ route('users.create') }}"> Add new Employee</a>
    
    </div>
   
    @if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif
    @php
    $i = 1;
    @endphp
    <table border=1>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile No</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $user)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->mobile }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    <div class="pagination justify-content-center">
        

    </div>
      
@endsection
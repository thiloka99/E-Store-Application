<head>
        <title>Registation Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body  style="border:solid 1px blue; padding:50px; text-align:center">
    <center>

    <div class="border border-primary" >
            <nav class="navbar navbar-dark bg-primary">
                <h1>Customer Registation</h1>
            </nav><br>
        <form action="{{route('users.store')}}" method="post">
            @csrf

            @if($message = Session::get('error'))
             <div>
                <button> x </button>
                <strong>{{$message}}</strong>
             </div>
            @endif

            @if($message = Session::get('success'))
             <div>
                <strong>{{$message}}</strong>
             </div>
            @endif

            @if($errors->any())
            <div>
                <ul>@foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach 
                </ul>
            </div><br>
            @endif

            Name: <input type="text" name="name"><br><br>
            Email: <input type="email" name="email"><br><br>
            Gender: <select name="gender">
                 <option value="m">Male</option>
                 <option value="f">Female</option>
            </select><br><br>
            Address; <input type="text" name="address"><br><br>
            Mobile: <input type="text" name="mobile"><br><br>
            <input type="hidden" name="role" value="customer">
            
            Password: <input type="password" name="password"><br><br>
            <button type="submit" name="btn" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
    </center>
</body>
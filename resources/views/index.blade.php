
<html>
<head>
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="position-absolute top-50 start-50 translate-middle">
    <center>

    <form action="{{url('login')}}" method="post">
    <div class="container-sm" style="border:solid 1px blue; padding:30px;text-align:center">

        <span class="d-block p-2 text-bg-primary">
            <h1>E-Store</h1>
        </span> 
        @if($message = Session::get('error'))
        <div>
            <button> x </button>
            <strong>{{$message}}</strong>
        </div>
        @endif

        @if ($errors->any())
        <div >
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <br><br>
                @csrf
                Email: <input type="email" name="email"><br><br>
                Password: <input type="password" name="password"><br><br>
                <button type="submit" name="logbtn" class="btn btn-primary">Login</button>
                <br>
    </div>
    <br><br>
            <a href="{{url('cusregister')}}" class="btn btn-primary" >Register</a>
            
    </form>  
    </center>
</body>
</html>
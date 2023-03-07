<head>
        <title>E-Store</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="btn-primary" style="padding:5px"><h1 style="text-align:center">E- Store</h1></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        @if(Auth::user()->role == "admin")  
            <div style="background-color:brown; color:white"> Admin DashBoard </div>
            <div>
                <a><button class="btn col-sm-2 btn-info">{{ Auth::user()->name }}</button></a>
                <a href="{{route('products.index')}}"><button class="btn col-sm-3 btn-info">products</button> </a> 
                 <a href="{{route('users.index')}}"><button class="btn col-sm-3 btn-info">employee</button> </a> 
                 <a href="{{url('logout')}}"> <button class="btn col-sm-3 btn-info">logout</button></a>
            </div> 

        @elseif(Auth::user()->role == "employee")
            <div style="background-color:brown; color:white">Employee DashBoard </div>
            <div>{{ Auth::user()->name }}<a href="{{route('myorder')}}"> My Orders </a>  <a href="{{url('logout')}}"> logout</a> </div>
        
        @elseif(Auth::user()->role == "customer")
            <div style="background-color:brown; color:white">Customer DashBoard </div>
                <div>
                <a><button class="btn col-sm-2 btn-info">{{ Auth::user()->name }}</button></a>
                <a href="{{route('orders.index')}}"><button class="btn col-sm-3 btn-info"> Place Order</button> </a> 
                <a href="{{url('logout')}}"><button class="btn col-sm-3 btn-info"> logout</button></a>
                </div>
        @endif
        
        @yield('content')

</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('front_assets/image/logo.jpg')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" ></script>
    
    <link rel="stylesheet" href="{{asset('front_assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/all.min.css')}}">
    <script src="https://kit.fontawesome.com/2125c8f17f.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>@yield('page_title')</title>
</head>
<body>
    <!--Nav Bare String-->
    <section class="nav-bar">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <a href="/"><img src="{{asset('front_assets/image/logo.jpg')}}" alt="logo"></a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('search')}}"> <i class="fa-solid fa-magnifying-glass"></i> Search </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('offer')}}"><i class="fa-solid fa-piggy-bank"></i> Offers </a>
                    </li>              
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('help')}}"><i class="fa-solid fa-question"></i> Help </a>
                    </li>
                    <li class="nav-item ">
                        
                        @if(session()->has('USER_ID'))
                        <a class="nav-link" href="{{url('user/logout')}}"><i class="fa-solid fa-user-plus"></i> Logout </a>
                        @else
                            <a class="nav-link" href="{{url('login')}}"><i class="fa-solid fa-user-plus"></i> sing in </a>
                            
                        @endif
                       
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('cart')}}"><i class="fa-solid fa-cart-arrow-down"></i> Cart </a>
                    </li>
                </ul>
            </div>
        </nav>

    </section>
    <!--End Bare String-->
    @section('container')
    @show
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>
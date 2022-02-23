@extends('front/layout')
@section('page_title','Restaurant Deatils')

@section('container')
    <!--Start first slider-->
    <section class="slider">
        <div class="post-container owl-carousel">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider1.jpg')}}" alt="slider1" srcset=""></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider2.jpg')}}" alt="slider2" srcset=""></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider3.jpg')}}" alt="slider3" srcset=""></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider4.jpg')}}" alt="slider4" srcset=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider5.jpg')}}" alt="slider5" srcset=""></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider6.jpg')}}" alt="slider6" srcset=""></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider7.jpg')}}" alt="slider7" srcset=""></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="singl-box">
                                            <div class="img-area"><img src="{{asset('front_assets/image/slider8.jpg')}}" alt="slider8" srcset=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End first slider-->
    <!--start fileter-->
    <section class="fileter">
        
        <nav class="navbar navbar-toggleable-md navbar-light navc">
            <h4>434</h4> <h4>Restaurants</h4>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto cl">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Relevance </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Delivery Time </a>
                    </li>              
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Rating </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Cost: Low To High </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Cost: High To Low </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Filters</a>
                    </li>
                </ul>
            </div>
        </nav>
        
    </section>
    <hr class="hr">

    <!--End fileter-->
    <!--start Main Contant-->
    <section class="main">
        <div class="container">
            <h1>Restaurantes</h1>
            <div class="row services">
                @foreach($data as $list)
                    <div class="col-md-3 text-center">
                    <a href="{{url('details')}}/{{$list->id}}">
                    <div class="image">
                        <img src="{{asset('storage/restaurants_image/'.$list->img)}}" alt="Amrut Restaurant">
                    </div>
                    <h3>{{$list->name}}</h3>
                    </a>
                    <hr class="prohr">
                    <div class="row">
                        <p class="tm">{{$list->time}} Mins </p>
                    </div>
                </div>
                @endforeach
                		
            </div>
        </div>
        
    </section>
    <!--start Main Contant-->
@endsection
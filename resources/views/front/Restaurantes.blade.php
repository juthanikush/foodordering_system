@extends('front/layout')
@section('page_title','Restaurant Deatils')

@section('container')

    <!--End Bare String-->
    <!--start Details of Restaurantes-->
    <section class="details">
        <div class="col-sm-12">
            <div class="row">
                
                <div class="col-md-3 lm"><img src="{{asset('storage/restaurants_image/'.$data[0]->img)}}" alt="{{$data[0]->name}}" ></div>
                <div class="col-md-5 kn">
                    <h2>{{$data[0]->name}}</h2>
                    <p>Punjabi, Chinese</p>
                    <p>{{$data[0]->address}}</p>
                    <div class="row mm">
                        <div class="col-md-1 dt"><p>3.8  <br>1000+ Ratings</p></div>
                        <div class="vls"></div>
                        <div class="col-md-2 dt">
                            <p>{{$data[0]->time}}<br> Delivery Time</p>
                        </div>
                        <div class="vlsa"></div>
                        <div class="col-md-2 dt">
                            <p>340 <br>Cost for two</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 addrem">
                    <input type="text" class="form-control"  name="search" placeholder="Search for Dishes..">
                    <Button class="btn btn-success">Pure Veg </Button><br>
                    @if(isset($data3[0]->id))
                    
                        @if($data[0]->id==$data3[0]->rid)
                            <a href="javascript:void(0)" onclick="remove_to_favourite('{{$data[0]->id}}')"  class="btn btn-danger ">Remove Favourite</a>
                        @else
                            <a href="javascript:void(0)" onclick="add_to_favourite('{{$data[0]->id}}')"  class="btn btn-info ">Favourite</a>
                        @endif
                    @else
                        <a href="javascript:void(0)" onclick="add_to_favourite('{{$data[0]->id}}')"  class="btn btn-info">Favourite</a>
                    @endif
                   
                </div>
            </div>
        </div>
    </section>
    <!--End Bare Details of Restaurantes-->
    <!--Start Main contant-->
    <section>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-2">
                    <div class="link">
                        @foreach($data2 as $list)
                        <a href="#{{$list->title}}" class="active1">{{$list->title}}</a><br>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-sm-1">
                    <div class="vl"></div>
                </div>
                <div class="col-sm-6">
                    <div class="containt">
                        @foreach($data1 as $list)
                        <section id="{{$list->title}}">
                            
                                <div class="cont">
                                    <h4>{{$list->name}}</h4>
                                    <img class="manu" src="{{asset('storage/menu_item_image/'.$list->image)}}" alt="{{$list->name}}" >
                                    <h6>${{$list->price}}</h6>
                                    <p>{{$list->short_desc}}</p>
                                    @php
                                        $var="";
                                    @endphp
                                    @foreach($data4 as $list1)
                                    
                                        @if($list->mid == $list1->mid)
                                            @php
                                                $var="yes";
                                                break;
                                            @endphp
                                        @endif
                                    @endforeach
                                        @if($var=="yes")
                                            
                                        @else
                                            <a class="btn btn-success {{$list->mid}}" href="javascript:void(0)" onclick="add_to_cart('{{$list->mid}}')" >Add to cart +</a>
                                        @endif
                                    
                                </div>
                                <hr class="prohr">
                        </section>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-sm-3">
                    <u><h1>ADD TO CART</h1></u>
                    @if(isset($data5[0]->id))
                        @foreach($data5 as $list)
                        <section id="add{{$list->id}}">
                            
                            <div class="cont">
                            <h4>{{$list->name}}</h4>
                                <img class="manu" src="{{asset('storage/menu_item_image/'.$list->image)}}" alt="{{$list->name}}" >
                                <h6>${{$list->price}}</h6>
                                <p>{{$list->short_desc}}</p>
                                <a href="javascript:void(0)" onclick="remove_add_to_cart('{{$list->id}}')" class="btn btn-danger">Remove</a>
                            </div>
                            <hr class="prohr">
                        </section>
                        @endforeach
                    @else
                        <img class="ec" src="{{asset('front_assets/image/tampalate/empty_cart.png')}}" alt="empty_cart" >
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
    <form id="fromsubmit">
        @csrf
       
        <input type="hidden" name="mid" id="mid">
        <input type="hidden" name="qty" id="qty">
    </form>
    <form id="favourite">
        @csrf
        <input type="hidden" name="id" id="id">
    </form>
    <form id="removefavourite">
        @csrf
        <input type="hidden" name="reid" id="reid">
    </form>
    <form id="removeadd_to_cart">
        @csrf
        <input type="hidden" name="addid" id="addid">
    </form>
    
    <script>
        function add_to_cart(mid)
        {
            jQuery('#mid').val(mid);
            jQuery('#qty').val(1);

            jQuery.ajax({
                url:"{{url('add_to_cart')}}",
                data:jQuery('#fromsubmit').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=='success'){
                        jQuery('.'+result.id).remove();
                        //window.location.href=window.location.href;
                    }
                }
            });
        }
        function add_to_favourite(id)
        {
            jQuery('#id').val(id);
            

            jQuery.ajax({
                url:"{{url('favourite')}}",
                data:jQuery('#favourite').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="success"){
                        jQuery('.btn-info').remove();
                        window.location.href=window.location.href;
                    }
                }
            });
        }
        function remove_to_favourite(id)
        {
            jQuery('#reid').val(id);
            

            jQuery.ajax({
                url:"{{url('removefavourite')}}",
                data:jQuery('#removefavourite').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="success"){
                        jQuery('.btn-danger').remove();
                        window.location.href=window.location.href;
                    }
                }
            });
        }
        function remove_add_to_cart(id)
        {
            jQuery('#addid').val(id);
            jQuery.ajax({
                url:"{{url('removeadd_to_cart')}}",
                data:jQuery('#removeadd_to_cart').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="success"){
                        jQuery('#add'+result.id).remove(); 
                    }
                }
            });
        }
        
    </script>
   
@endsection
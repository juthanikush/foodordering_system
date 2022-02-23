@extends('front/layout')
@section('page_title','CART')

@section('container')
    <!--start Main Contant-->
    <section class="main wwww ">
        <div class="container">
            <center><u><h1>Cart</h1></u></center>
            <div class="container">
                <div class="row">
                @php
                    $total=0;
                @endphp
                @foreach($data as $list)
                    <div class="col-sm-12 {{$list->id}}">
                       
                        <div class="Cart-Items">
                            <div class="image-box">
                            <img src="{{asset('storage/menu_item_image/'.$list->image)}}" height="120px"/>
                            </div>
                            <div class="about">
                            <h1 class="title">{{$list->name}}</h1>
                            <h3 class="subtitle">${{$list->price}}</h3>
                           
                            </div>
                            
                            
                            <div class="counter">
                                <a class="btn bn" href="javascript:void(0)" onclick="add_qty('{{$list->atcid}}')">+</a>
                                <div class="count qty{{$list->atcid}}">{{$list->qty}}</div>
                                <a class="btn bn" href="javascript:void(0)" onclick="remove_qty('{{$list->atcid}}')">-</a>
                            </div>
                            <div class="prices">

                                <div class="amount total{{$list->atcid}}">${{$list->price*$list->qty}}</div>
                                <a class="btn btn-danger {{$list->atcid}}" href="javascript:void(0)" onclick="remove_add_to_cart('{{$list->id}}')" >Remove</a> 
                            </div>
                        </div>
                        @php
                            $total+=$list->price*$list->qty;
                        @endphp
                    </div>
                @endforeach
                    <hr> 
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      
                        <div class="checkout">
                            <div class="total">
                                <div>
                                    <div class="Subtotal"></div>
                                    <div class="items">Total</div>
                                </div>
                                <div class="total-amount grandtotal">${{$total}}</div>
                            </div>
                            <form method="post" action="{{route('checkout')}}">
                                @csrf
                                <button class="bv button">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <form id="removeadd_to_cart">
        @csrf
        <input type="hidden" name="addid" id="addid">
    </form>
    <form id="add_qty">
        @csrf
        <input type="hidden" name="add" id="add">
    </form>
    <form id="remove_qty">
        @csrf
        <input type="hidden" name="remove" id="remove">
    </form>
    <!--start Main Contant-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>  
    <script>
        function remove_add_to_cart(id)
        {
            jQuery('#addid').val(id);
            jQuery.ajax({
                url:"{{url('removeadd_to_cart')}}",
                data:jQuery('#removeadd_to_cart').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="success"){
                        jQuery('.'+result.id).remove(); 
                    }
                }
            });
        }
        function add_qty(atcid)
        {
            jQuery('#add').val(atcid);
            jQuery.ajax({
                url:"{{url('add_qty')}}",
                data:jQuery('#add_qty').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="success"){
                        jQuery('.qty'+result.id).html(result.qty);
                        jQuery('.total'+result.id).html('$'+result.total);
                        jQuery('.grandtotal').html('$'+result.grandtotal);
                        
                        //window.location.href=window.location.href;
                    }
                }
            });
        }
        function remove_qty(atcid)
        {
            jQuery('#remove').val(atcid);
            jQuery.ajax({
                url:"{{url('remove_qty')}}",
                data:jQuery('#remove_qty').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="success"){
                        jQuery('.qty'+result.id).html(result.qty);
                        jQuery('.total'+result.id).html('$'+result.total);
                        jQuery('.grandtotal').html('$'+result.grandtotal);
                        
                        //window.location.href=window.location.href;
                    }
                }
            });
        }
    </script>
@endsection
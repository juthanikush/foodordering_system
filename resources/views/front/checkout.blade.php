@extends('front/layout')
@section('page_title','CART')

@section('container')
<div class="container">
                <div class="row">
                @php
                    $total=0;
                @endphp
                @foreach($data as $list)
                    <div class="col-sm-12">
                       
                        <div class="Cart-Items">
                            <div class="image-box">
                            <img src="{{asset('storage/menu_item_image/'.$list->image)}}" height="120px"/>
                            </div>
                            <div class="about">
                            <h1 class="title">{{$list->name}}</h1>
                            <h3 class="subtitle">${{$list->price}}</h3>
                           
                            </div>
                            
                            
                            <div class="counter">
                                
                                <div class="count">QTY:{{$list->qty}}</div>
                                
                            </div>
                            <div class="prices">
                                <div class="amount">${{$list->price*$list->qty}}</div>
                                
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
                                    <h1>Total:</h1>
                                </div>
                                <div class="total-amount">${{$total}}</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
    <div class="container">
        <div class="row">
            <h1>Address</h1>
            <form method="post" action="{{url('ordered')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Road Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="rona" placeholder="Enter Road Name">
                  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rasident Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="rn" placeholder="Rasident Name">
                </div>
                
              <h1>Payment Type</h1>
              
                  <input type="radio" name="payment" value="cod">COD <br>
                  <input type="radio" name="payment" value="online">online payment<br>

                  <button class="btn btn-info">Submit</button>
              </form>
              
        </div>
    </div>
    
@endsection   
    
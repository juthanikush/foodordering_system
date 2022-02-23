@extends('admin/layout')
@section('page_title','Deshboard')
@section('Restaurants_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
{{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
   </button>
</div>
@endif
    <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    
                </div>
                <!-- /Widgets -->
                <a href="{{url('admin/add_restaurants')}}" class="btn btn-success">+Add Restaurants</a><br><br>
                
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Restaurants </h4>
                                </div>
                                @if(isset($data))
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="avatar">Image</th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $list)
                                                <tr>
                                                    
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="circle" src="{{asset('storage/restaurants_image/'.$list->img)}}" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> {{$list->id}} </td>
                                                    <td>  <span class="name">{{$list->name}}</span> </td>
                                                    <td> <span class="product">{{$list->email}}</span> </td>
                                                    <td><span class="count">{{$list->address}}</span></td>
                                                    <td><span class="count">{{$list->city}}</span></td>
                                                    <td>
                                                        @if($list->status==1)
                                                            <a class="btn btn-outline-warning" href="{{url('admin/restaurants/deactive')}}/{{$list->id}}">Deactive</a>
                                                        @else
                                                            <a class="btn btn-outline-success" href="{{url('admin/restaurants/active')}}/{{$list->id}}">Active</a>
                                                        @endif
                                                        <!-- <a href="{{url('restaurants/edit')}}/{{$list->id}}" class="btn btn-outline-info">Edit</a> -->
                                                        <a class="btn btn-outline-danger" href="{{url('admin/restaurants/delete')}}/{{$list->id}}">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                                @else
                                    <center><h1>Data Is Not Exit</h1></center>
                                @endif
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                       
                    </div>
                </div>
                <!-- /.orders -->
                
                <!-- Modal - Calendar - Add New Event -->
                
                <!-- /#event-modal -->
                
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
    </div>
@endsection
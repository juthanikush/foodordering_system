@extends('admin/layout')
@section('page_title','Menu')
@section('vendore_menu_itmes_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
{{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
   </button>
</div>
@endif
        <!--- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    
                </div>
                <!-- /Widgets -->
               
                <a href="{{url('vendore/add/menu_details')}}" class="btn btn-success">+Add Menu </a><br><br>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Menu </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Menu Title</th>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $id=1;
                                                @endphp
                                                @foreach($data as $list)
                                                <tr>
                                                    
                                                    <td class="serial">{{$id}}</td>
                                                    <td><span class="count">{{$list->title}}</span></td>
                                                    <td><span class="count">{{$list->name}}</span></td>
                                                    <td><span class="count"><img src="{{asset('storage/menu_item_image/'.$list->image)}}" alt="" srcset=""></span></td>
                                                    <td><span class="count">{{$list->price}}</span></td>
                                                    <td>
                                                        @if($list->status==1)
                                                            <a class="btn btn-outline-warning" href="{{url('vendore/menuitemdetails/deactive')}}/{{$list->id}}">Deactive</a>
                                                        @else
                                                            <a class="btn btn-outline-success" href="{{url('vendore/menuitemdetails/active')}}/{{$list->id}}">Active</a>
                                                        @endif
                                                        <a href="{{url('vendore/menuitemdetails/edit')}}/{{$list->id}}" class="btn btn-outline-info">Edit</a>
                                                        <a class="btn btn-outline-danger" href="{{url('vendore/menuitemdetails/delete')}}/{{$list->id}}">Delete</a>
                                                    </td>
                                                    
                                                </tr>
                                                @php
                                                    $id+=1;
                                                @endphp
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
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
@endsection
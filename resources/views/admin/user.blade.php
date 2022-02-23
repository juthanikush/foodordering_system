@extends('admin/layout')
@section('page_title','User')
@section('user_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
{{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
   </button>
</div>
@endif
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    
                </div>
                <!-- /Widgets -->
               
                
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">User </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                  
                                                    <th>Phone Number</th>
                                                  
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $list)
                                                <tr>
                                                    <td> {{$list->id}} </td>
                                                    <td>  <span class="name">{{$list->name}}</span> </td>
                                                   
                                                    <td><span class="count">{{$list->phone_number}}</span></td>
                                                    
                                                    <td>
                                                        @if($list->status==0)
                                                        <a href="{{url('admin/user/active')}}/{{$list->id}}" class="btn btn-outline-success">Active</a>
                                                        @else
                                                        <a href="{{url('admin/user/deactive')}}/{{$list->id}}" class="btn btn-outline-warning">Deactive</a>
                                                        @endif
                                                        <a class="btn btn-outline-danger" href="{{url('admin/user/delete')}}/{{$list->id}}">Delete</a>

                                                    </td>
                                                </tr>
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
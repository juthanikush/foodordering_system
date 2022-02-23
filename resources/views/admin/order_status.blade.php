@extends('admin/layout')
@section('page_title','Order Status')
@section('order_satus_select','active')
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
               
                <a href="{{url('admin/add_status')}}" class="btn btn-success">+Add Status</a><br><br>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Orders Status</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $list)
                                                <tr>
                                                    <td class="serial">{{$list->id}}</td>
                                                    <td><span class="count">{{$list->status_title}}</span></td>
                                                    <td>
                                                        @if($list->status==1)
                                                            <a class="btn btn-outline-warning" href="{{url('admin/status/deactive')}}/{{$list->id}}">Deactive</a>
                                                        @else
                                                            <a class="btn btn-outline-success" href="{{url('admin/status/active')}}/{{$list->id}}">Active</a>
                                                        @endif
                                                        <a href="{{url('admin/status/edit')}}/{{$list->id}}" class="btn btn-outline-info">Edit</a>
                                                        <a class="btn btn-outline-danger" href="{{url('admin/status/delete')}}/{{$list->id}}">Delete</a>
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
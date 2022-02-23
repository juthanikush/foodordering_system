@extends('admin/layout')
@section('page_title','Favourite')
@section('favourite_select','active')
@section('container')

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
                                    <h4 class="box-title">Favourite </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        @if(isset($data))
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Restaurant Name</th>
                                                    <th>User Name</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $list)
                                                <tr>
                                                    
                                                    <td>{{$list->id}}  </td>
                                                    <td>  <span class="name">{{$list->rname}}</span> </td>
                                                    
                                                    <td><span class="count">{{$list->name}}</span></td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <center><h1>Data Not Found</h1></center>
                                        @endif
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
@extends('admin/layout')
@section('page_title','Order Status')
@section('order_satus_select','active')
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
                                <div class="card">
                                    <div class="card-header">
                                        Add Status
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{Route('admin.add_status')}}" method="post" class="form-horizontal">
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col col-sm-2"><label for="input-small" class=" form-control-label">Status</label></div>
                                                <div class="col col-sm-10">
                                                
                                                    <h1>ij</h1>
                                                    <input type="text" id="input-small" name="title" placeholder="Enter The Status " class="input-sm form-control-sm form-control">
                                                
                                                
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <input type="submit" class="btn btn-info btn-sm" value="  Submit">
                                        <input type="reset" class="btn btn-danger btn-sm" value="Reset">
                                     
                                    </div>
                                        </form>
                                    </div>
                                    
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
@endsection
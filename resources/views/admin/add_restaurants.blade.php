@extends('admin/layout')
@section('page_title','Add New Restaurants')
@section('Restaurants_select','active')
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
                                        Add Restaurants
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{route('admin.restaurants')}}" method="post" class="form-horizontal">
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col col-sm-2"><label for="input-small" class=" form-control-label">Email</label></div>
                                                <div class="col col-sm-10"><input type="text" id="input-small" name="email" placeholder="Enter The Email " class="input-sm form-control-sm form-control"></div>
                                                <br><br>
                                                @error('email')
                                                <div class="alert alert-danger col-sm-12" role="alert">
                                                    {{$message}}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                    
                                                @enderror
                                            </div>
                                           
                                        
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-info btn-sm" value="  Submit">
                                        <input type="reset" class="btn btn-danger btn-sm" value="Reset">
                                    </div>
                                    </form>
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
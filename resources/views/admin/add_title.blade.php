@extends('admin/layout')
@section('page_title','Menu Items')
@section('vendore_menu_title_select','active')
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
                                        Add Title
                                    </div>
                                    <form action="{{Route('vendore.add_title')}}" method="post" class="form-horizontal" id="form-horizontal">
                                        <div class="card-body card-block">
                                            @csrf
                                            <div class="row form-group" id="row">
                                                <div class="col col-sm-2"><label for="input-small" class=" form-control-label">Title</label></div>
                                                <div class="col col-sm-10">
                                                
                                                    
                                                    <input type="text" id="input-small" name="title[]" placeholder="Enter The Title " class="input-sm form-control-sm form-control">
                                                
                                                
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <input type="submit" class="btn btn-info btn-sm" value="  Submit">
                                                <input type="reset" class="btn btn-danger btn-sm" value="Reset">
                                     
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <button class="btn btn-success" onclick="add_one()">+Add ONE</button>
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

<script>

    function add_one()
    {
       
        var html='<div class="col col-sm-2"><label for="input-small" class=" form-control-label">Title</label></div><div class="col col-sm-10"><input type="text" id="input-small" name="title[]" placeholder="Enter The Title " class="input-sm form-control-sm form-control"></div>';

        jQuery('#row').append(html);
    }
</script>

@endsection
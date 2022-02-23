@extends('admin/layout')
@section('page_title','Menu Details')
@section('vendore_menu_itmes_select','active')
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
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Menu Details</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        
                                        <form action="{{route('vendore.add_menu_details')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            
                                           <div id="aom">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="name[]" class="form-control" required>
                                                        
                                                    </div>
                                                    @error('name')
                                                        <br>
                                                        <div class="alert alert-danger col-sm-12" role="alert">
                                                            {{$message}}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Short Desc</label>
                                                        <textarea id="w3review" name="short_desc[]" rows="1" cols="50" required></textarea>
                                                    </div>
                                                    @error('short_desc')
                                                        <br>
                                                        <div class="alert alert-danger col-sm-12" role="alert">
                                                            {{$message}}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Menu Title</label>
                                                        <select name="title[]" id="cars" class="form-control" required>
                                                            <option value="">Selct The Title Of Menu</option>
                                                                @foreach($data as $list)
                                                                <option value="{{$list->id}}">{{$list->title}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    @error('title')
                                                        <br>
                                                        <div class="alert alert-danger col-sm-12" role="alert">
                                                            {{$message}}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Price</label>
                                                    <div class="input-group">
                                                        <input  name="price[]" type="text" class="form-control cc-cvc" required >
                                                        
                                                    </div>
                                                    @error('price')
                                                        <br>
                                                        <div class="alert alert-danger col-sm-12" role="alert">
                                                            {{$message}}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        
                                                        <input id="image" name="image[]" type="file"  class="form-control" aria-required="true" aria-invalid="false">
                                                        
                                                        @error('image')
                                                        <br>
                                                        <div class="alert alert-danger col-sm-12" role="alert">
                                                            {{$message}}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div>
                                                <button  type="submit" class="btn btn-lg btn-info btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                            
                                    </div>
                                    <button  type="submit" onclick="add_one_more()" class="btn btn-lg btn-success btn-block">
                                        Add One More
                                    </button>
                                </div>

                            </div>
                        </div> <!-- .card -->

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

    function add_one_more()
    {
       
        var html='<hr><div class="row"><div class="col-6"><label for="x_card_code" class="control-label mb-1">Name</label><div class="input-group"><input required type="text" name="name[]" class="form-control"></div></div><div class="col-6"><div class="form-group"><label for="cc-exp" class="control-label mb-1">Short Desc</label><textarea required id="w3review" name="short_desc[]" rows="1" cols="50"></textarea></div></div></div><div class="row"><div class="col-4"><div class="form-group"><label for="cc-exp" class="control-label mb-1">Menu Title</label><select required name="title[]" id="cars" class="form-control"><option value="">Selct The Title Of Menu</option>@foreach($data as $list)<option value="{{$list->id}}">{{$list->title}}</option>@endforeach</select></div></div><div class="col-4"><label for="x_card_code" class="control-label mb-1">Price</label><div class="input-group"><input required  name="price[]" type="text" class="form-control cc-cvc" ></div></div><div class="col-4"><div class="form-group"><label>Image</label><input id="image" name="image[]" type="file"  class="form-control" aria-required="true" aria-invalid="false">@error("image")<br><div class="alert alert-danger col-sm-12" role="alert">{{$message}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>@enderror</div></div></div></div>';

        jQuery('#aom').append(html);
    }
</script>

@endsection
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
                                        
                                        <form action="{{route('vendore.update_menu_details')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data[0]->id}}">
                                           <div id="aom">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="name" class="form-control" value="{{$data[0]->name}}" required>
                                                        
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
                                                        <textarea id="w3review" name="short_desc" rows="1" cols="50" required>{{$data[0]->short_desc}}</textarea>
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
                                                        <select name="title" id="cars" class="form-control" required>
                                                            <option value="">Selct The Title Of Menu</option>
                                                                @foreach($data1 as $list)
                                                                    @if($data[0]->mid==$list->id)
                                                                        <option selected value="{{$list->id}}">
                                                                    @else
                                                                        <option value="{{$list->id}}">
                                                                    @endif
                                                                        {{$list->title}}
                                                                    </option>
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
                                                        <input  name="price" value="{{$data[0]->price}}" type="text" class="form-control cc-cvc" required >
                                                        
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
                                                        
                                                        <input id="image" name="image" type="file"  class="form-control" aria-required="true" aria-invalid="false">
                                                        <img src="{{asset('storage/menu_item_image/'.$data[0]->image)}}" alt="" srcset=""></span></td>
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



@endsection
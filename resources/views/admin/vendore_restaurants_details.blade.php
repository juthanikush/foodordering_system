@extends('admin/layout')
@section('page_title','Restaurants Details')
@section('vendore_restaurants_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
{{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
   </button>
</div>
@endif
<div class="login-content">
    <div class="login-form">
        <form action="{{route('vendore.update.restaurants')}}" method="post"   enctype="multipart/form-data">
             @csrf
            <input type="hidden" name="id" value="{{$data[0]->id}}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{$data[0]->name}}">
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
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Name" name="email" value="{{$data[0]->email}}">
                @error('email')
                <br>
                <div class="alert alert-danger col-sm-12" role="alert">
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label><br>
                <a href="{{url('vendore/change_password')}}/{{$data[0]->id}}" class="btn btn-danger">Change Password</a>
                @error('password')
                <br>
                <div class="alert alert-danger col-sm-12" role="alert">
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Image</label>
                <input id="image" name="image" type="file"  class="form-control" aria-required="true" aria-invalid="false">
                <img src="{{asset('storage/restaurants_image/'.$data[0]->img)}}" alt="" srcset="" height="100px" width="100px">
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
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address" value="{{$data[0]->address}}">
                @error('address')
                <br>
                <div class="alert alert-danger col-sm-12" role="alert">
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="City" name="city" value="{{$data[0]->city}}">
                @error('city')
                <br>
                <div class="alert alert-danger col-sm-12" role="alert">
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>pure_vage</label>
                @if($data[0]->pure_veg=='on')
                <input type="checkbox" checked  name="veg">
                @else
                <input type="checkbox"  name="veg">
                @endif
                @error('veg')
                <br>
                <div class="alert alert-danger col-sm-12" role="alert">
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Delivery Time</label>
                <input type="text" value="{{$data[0]->time}}" class="form-control" placeholder="Time" name="delitime">
                @error('delitime')
                <br>
                <div class="alert alert-danger col-sm-12" role="alert">
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">UPDATE</button>
        </form>
    </div>
</div>
@endsection
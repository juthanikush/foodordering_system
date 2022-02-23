@extends('front/layout')
@section('page_title','Login')
@section('container')

    <div class="container">
        <div class="row www">
            
            <din class="col-sm-3">
            </din>
            <div class="col-sm-6">
                <b><h1 class="log">Login Here</h1></b>
                <form class="lo" method="post" action="{{route('user_login')}}">
                    @if(session()->has('message'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        {{session('message')}}
                            
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                      <label class="lola">Phone Number</label>
                      <input type="text" name="number" class="form-control" placeholder="Enter Your Phone Number">
                    </div>
                    <button class="btn btn-info">Submit</button>
                    <br>
                    <a class="lo" href="{{url('registrashion')}}">Create New Account</a>
                  </form>
                 
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </div>
@endsection 

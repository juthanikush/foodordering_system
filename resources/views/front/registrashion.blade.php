@extends('front/layout')
@section('page_title','Registrashion')
@section('container')
    <div class="container">
        <div class="row">
            
            <din class="col-sm-3">
            </din>
            <div class="col-sm-6 www">
                <b><h1 class="loz">Create New Account</h1></b>
                <form  class="lo" method="post" action="{{url('register')}}">
                    @if(session()->has('message'))
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        {{session('message')}}
                            
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="lola">Name</label>
                      <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="lola">Phone Number</label>
                        <input type="text" name="number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="lola">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="pwd" required aria-describedby="emailHelp" placeholder="Enter Your Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="lola">Conform Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="cpwd" required aria-describedby="emailHelp" placeholder="Enter Your Conform Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button><br>
                    <a class="lo" href="{{url('login')}}">login to your account</a>
                  </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
       
    </div>
@endsection   

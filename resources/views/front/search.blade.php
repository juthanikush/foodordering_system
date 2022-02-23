@extends('front/layout')
@section('page_title','Search')
@section('container')
<form action="{{url('name')}}" method="post">
    @csrf
    <input type="text" class="form-control" name="search" placeholder="Search Restaurantes Name..">
    <button class="btn btn-info">Search</button>
</form>
@if(isset($data[0]->id))
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
        </tr>
        @foreach($data as $list)
        <tr>
            <td><a href="{{url('details')}}/{{$list->id}}">{{$list->id}}</a></td>
            <td><a href="{{url('details')}}/{{$list->id}}">{{$list->name}}</a></td>
            <td><a href="{{url('details')}}/{{$list->id}}">{{$list->address}}</a></td>
        </tr>
        @endforeach
    </table>
@else
    @if(isset($data))
    <h1>No Restaurantes Found</h1>
    @else
        
    @endif
    
@endif
@endsection
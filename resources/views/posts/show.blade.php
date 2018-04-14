@extends('layouts.master')


@section('content')
<br/>
<div class="row">
    <div class="col-1"></div>
<div class="card " >
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title font-weight-bold" style="">Title:- </h5>
    <h5 class="card-text" >{{$post->title}}</h5>   <br/>
    <h5 class="card-title font-weight-bold" style="">Description:- </h5>
    <h5 >{{$post->description}}</h5>
 
  </div>
</div>
</div>
<br/>
<div class="row">
    <div class="col-1"></div>
<div class="card " >
  <div class="card-header">
    Post Creator Info 
  </div>
  <div class="card-body">
  <h5 class="card-title font-weight-bold" style="">Name:- </h5>
    <h5 class="card-text" >{{$post->user->name}}</h5>   <br/>
    <h5 class="card-title font-weight-bold" style="">Email:- </h5>
    <h5 class="card-text" >{{$post->user->email}}</h5>   <br/>
    <h5 class="card-title font-weight-bold" style="">Created at:- </h5>
    <h5 class="card-text" ></h5> {{$post->user->created_at->format('l jS \\of F Y h:i:s A')}}  <br/>
  </div>
</div>
</div>




@endsection
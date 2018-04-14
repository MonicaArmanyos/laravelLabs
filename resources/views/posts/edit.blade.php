@extends('layouts.master')


@section('content')
<div class="container-fluid">
<form method="put" action="{{route('posts.update',['post'=>$post->id])}}">
{{csrf_field()}}
Title :- <input class="form-control" type="text" name="title" value="{{$post->title}}">
<br><br>
Description :- 
<textarea class="form-control" name="description"  >{{$post->description}}</textarea>
<br>
<br>
Post Creator
<select class="form-control" name="user_id" value="{{$post->user->name}}">
@foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach

</select>
<br>
<input type="submit" value="Update" class="btn btn-primary">
</form>

</div>

@endsection
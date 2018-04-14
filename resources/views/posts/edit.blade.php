@extends('layouts.master')


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
<form method="POST" action="{{route('posts.update',['post'=>$post->id])}}">
{{ method_field('PUT') }}
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
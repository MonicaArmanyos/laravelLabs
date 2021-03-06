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
<form method="post" action="/posts">
{{csrf_field()}}
Title :- <input class="form-control" type="text" name="title">
<br><br>
Description :- 
<textarea class="form-control" name="description"></textarea>
<br>
<br>
Post Creator
<select class="form-control" name="user_id">
@foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach

</select>
<br>
<input type="submit" value="Create" class="btn btn-success">
</form>

</div>

@endsection
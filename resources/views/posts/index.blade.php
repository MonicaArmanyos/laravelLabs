@extends('layouts.master')


@section('content')

<!---$posts dy hia esm el key b3tbro variable---
@foreach ($posts as $post)


<li>{{ $post->title }}  And The Creator is ({{$post->user->name}})</li>


@endforeach
--->
<div class="col-md-12 text-center">
    <button type="button" class="btn btn-primary" onclick="location.href='posts/create'">Create Post</button>
</div>
<br/>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#Pagination Bonus</th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($posts as $post)


<tr>
<th scope="row">{{ $post->id }}</th>
<td>{{ $post->title }}</td>
<td>{{$post->user->name}}</td>
<td>{{ $post->created_at }}</td>
<td> <button type="button" class="btn btn-success" onclick="location.href='{{route('posts.show',['post' =>$post->id])}}'">View</button>
    <button type="button" class="btn btn-primary" >Edit</button>
    <button type="button" class="btn btn-danger">Delete</button>
</td>
@endforeach
  </tbody>
</table>

@endsection
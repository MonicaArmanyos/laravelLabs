@extends('layouts.master')


@section('content')

<!---$posts dy hia esm el key b3tbro variable---
@foreach ($posts as $post)


<li>{{ $post->title }}  And The Creator is ({{$post->user->name}})</li>


@endforeach
--->
<div class="col-md-12 text-center">
    <button type="button" class="btn btn-primary" onclick="location.href='{{route('posts.create')}}'">Create Post</button>
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
      <th scope="col">Slug</th>
    </tr>
  </thead>
  <tbody>
    @php
    $count=0
    @endphp
      @foreach ($posts as $post)


<tr>
  @php $count++ @endphp
<th scope="row">{{ $page*2+$count}}</th>
<td>{{ $post->title }}</td>
<td>{{$post->user->name}}</td>
<td>{{ $post->created_at }}</td>
<td> <button type="button" class="btn btn-success" onclick="location.href='{{route('posts.show',['post' =>$post->id])}}'">View</button>
    <button type="button" class="btn btn-primary" onclick="location.href='{{route('posts.edit',['post' =>$post->id])}}'">Edit</button>
    <button type="button" class="btn btn-danger delete"  targ="{{$post->id}}" >Delete</button>
</td>
<td>{{ $post->slug }}</td>
@endforeach
  </tbody>
</table>
{{$posts->links()}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="{{ asset('js/warn.js') }}"></script>
<script>
  $(".delete").on('click',function(){
  var my = this;
    var con = confirm("are you sure");
    if(con){
        $.ajax(
          {
            url: "posts/"+$(my).attr("targ") , 
            type: 'DELETE',
            data : {'_token' : '{{csrf_token()}}'},
            success : function (res) {
              console.log(res);
               location.reload(); 
            },
            error : function(err){
              console.log(err)
            }
          }
        );
    }
  });


</script>
@endsection
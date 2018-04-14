<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $post = $posts->first();

        return view('posts.index',[

            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        $validated = $request-> validated();
        
       return redirect(route('posts.index')); 
    }
    public function show($id)   
    {
        $post=Post::findOrFail($id);
        
        return view('posts.show',['post' => $post]);
    }
    public function edit($id)
    {
        $users = User::all();
        $post_edit=Post::findOrFail($id);//
        return view('posts.edit',['post' => $post_edit,'users'=>$users]);
    }
    public function update($id,StorePostRequest $request)
    {
        $post_edit=Post::findOrFail($id);
        $post=Post::where('id', $id);
        $post->update(['title' => $request->title,
        'description' => $request->description,
        'user_id' => $request->user_id]);
        $validated = $request-> validated($request->user_id);
        return redirect(route('posts.index')); 
    }
    public function destroy($id)
    {
        //dd($id);
        Post::find($id)->delete();
        return ["status"=>"true"];
    }

}

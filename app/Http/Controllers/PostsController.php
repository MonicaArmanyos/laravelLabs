<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;

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

    public function store(Request $request)
    {
        // dd($request->all());
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        
       return redirect(route('posts.index')); 
    }
    public function show($id)   
    {
        $post=Post::findOrFail($id);
        return view('posts.show',['post' => $post]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\DB;
class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
       $post = $posts->first();
       $page=$posts->currentPage()-1;
        return view('posts.index',[

            'posts' => $posts,
            'page'=>$page
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
    public function update($id,UpdatePostRequest $request)
    {
        $post_edit=Post::findOrFail($id);
        $post=Post::where('id', $id);
        $post->update(['title' => $request->title,
        'description' => $request->description,
        'user_id' => $request->user_id]);
        $validated = $request-> validated();
        return redirect(route('posts.index')); 
    }
    public function destroy($id)
    {
        //dd($id);
        Post::find($id)->delete();
        return ["status"=>"true"];
    }

}

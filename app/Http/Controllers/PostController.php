<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();
        $posts = Post::paginate(8);
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        $allUsers = User::all();

        return view('posts.create', [
            'allUsers' => $allUsers
        ]);
    }

    public function show($postId)
    {
        
        $post = Post::find($postId);
        $comments = Comment::where('commentable_type', 'App\Models\Post')->where('commentable_id',$postId)->get();
        return view('posts.show', ['post' => $post ,"comments"=> $comments]);
        ;
    }

    public function store()
    {
        $data = request()->all();
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator']
        ]);
        return redirect('/posts');
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
        $allUsers = User::all();
        return view('posts.edit', ['post' => $post,'users'=> $allUsers]);
        ;
    }
    public function update($postId)
    {
        $data = request()->all();

        $updatedPost=Post::find($postId);
        $updatedPost->title=$data['title'];
        $updatedPost->description=$data['description'];
        $updatedPost->user_id=$data['post_creator'];

        $updatedPost->save();
        return redirect('posts');
    }
    public function destroy($postId)
    {
        $deletedPost=Post::find($postId);
        $deletedPost->delete();
        // return view('posts.destroy', ['postId' => $postId]);
        return redirect('posts');
    }
}

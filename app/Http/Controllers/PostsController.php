<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a index page.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store() {
        request()->validate([
            'title' => ['required', 'min:3'] ,
            'body' => ['required', 'min:3']
        ]);

        $post = new Post();

        $post->user_id = '1';
        $post->title = request('title');
        $post->body = request('body');

        $post->save();

        return redirect('/');
    }

    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }

}

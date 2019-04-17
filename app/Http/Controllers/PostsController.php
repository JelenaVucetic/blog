<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
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
        $categories = Category::all();
        return view('posts.index', compact('posts' , 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create' , compact('categories'));
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
        $categories = Category::all();
        return view('posts.show' , compact('post', 'categories'));
    }

}

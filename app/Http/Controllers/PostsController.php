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
        //$posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }
}

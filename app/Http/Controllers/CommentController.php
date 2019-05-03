<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;


class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {

        $this->validate(request(), [
            'name' => 'required|min:3',
            'body' => 'required|min:3' ,
            'email' => 'required'
        ]);

        $post -> addComment(request('body' , 'name' , 'email'));

        return back();

    }
}

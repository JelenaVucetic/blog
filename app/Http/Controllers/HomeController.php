<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->posts->map(function($post){
            $post->title = substr($post->title , 0, 50);
            $post->body = substr($post->body , 0, 50).'...';
            return $post;
        });
        return view('home', compact('categories'))->with('posts', $user->posts);
    }
}

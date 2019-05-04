<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function index() {
        $categories = Category::all();
        $q = Input::get('q');
        $post = Post::where('title', 'LIKE', '%' .$q . '%')->get();
        if(count($post) > 0) {
        return view('posts.test', compact('categories'))->withDetails($post)->withQuery($q);
        }
        else return view('posts.test', compact('categories'))->withMessage('No Details found! Please try to search again!');
        }
}

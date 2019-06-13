<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::all();
        $category->posts->map(function($post){
            $post->title = substr($post->title , 0, 50).'...';
            $post->body = substr($post->body , 0, 70).'...';
            return $post;
        });
        return view('categories.show' , compact('category', 'categories'));
    }


}

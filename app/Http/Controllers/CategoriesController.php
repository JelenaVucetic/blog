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
        return view('categories.show' , compact('category'));
    }


}

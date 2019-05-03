<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Image;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a index page.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::latest()->get();
        $posts = $posts->map(function($post){
            $post->title = substr($post->title , 0, 50);
            $post->body = substr($post->body , 0, 50).'...';
            return $post;
        });
        $categories = Category::all();

        return view('posts.index', compact('posts' , 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create' , compact('categories'));
    }

    public function store(Request $request) {

        request()->validate([
            'title' => ['required', 'min:3'] ,
            'body' => ['required', 'min:3'],
        ]);

        //Handle File Upload
        if($request->hasFile('images')) {
            //Get File name with the extension
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('images')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'post-1.jpg';
        }


        $post = new Post();

        $post->user_id = auth()->user()->id;
        $post->title = request('title');
        $post->body = request('body');

        $image = new Image();
        $image->name = $fileNameToStore;

        $post->save();
        $post->images()->save($image);
        $category_id = request('categories');
        $post->categories()->attach($category_id);

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        return view('posts.show' , compact('post', 'categories'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        //Check for correct user
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => ['required', 'min:3'] ,
            'body' => ['required', 'min:3'],
        ]);
        //Handle File Upload
        if($request->hasFile('images')) {
            //Get File name with the extension
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('images')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'post-1.jpg';
        }

        $post = Post::find($id);

        $post->title = request('title');
        $post->body = request('body');

        $image = new Image();
        $image->name = $fileNameToStore;

        $post->save();
        $post->images()->save($image);
        $category_id = request('categories');
        $post->categories()->attach($category_id);

        return redirect('/posts')->with('success', 'Post has been updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

         if(auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        
        $post->delete();

        return redirect('/posts')->with('success', 'Post has been removed');
    }
}

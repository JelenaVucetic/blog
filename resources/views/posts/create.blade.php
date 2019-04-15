@extends('layouts.master')

@section('header')
    Create Post
@endsection

@section('content')

<div class="col-sm-8 blog-main">
    <h1>Publish a post</h1>

    <form method="POST" action="/posts">
        @csrf
    <hr>

    <form method="POST" action="/">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
          <label for="body">Body</label>
          <textarea name="body" id="body" class="form-control" value="{{ old('body') }}" required></textarea>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
        </div>

   {{--  <div class="form-group">
            <label for="category">Select Category</label>
            @foreach ($post->categories as $category)
             <option value="{{$category->cat_id}}"> {{$category->name}}</option>
            @endforeach
        </div> --}}
       @include('layouts.errors')

      </form>



</div>

@endsection

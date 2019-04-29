@extends('layouts.master')


@section('select2link')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection


@section('header')
    Edit Post
@endsection

@section('content')

<div class="col-sm-8 blog-main">
    <h1>Publish a post</h1>

    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
       @csrf
       @method('PUT')

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <img width="400" src="/storage/images/{{$post->images->first()->name}}" alt="">
            <input type="file" class="form-control" name="images">
        </div>

        <div class="form-group">
          <label for="body">Description</label>
          <textarea id="summary-ckeditor" name="body" id="body" class="form-control" required>{{$post->body}}</textarea>
        </div>
        
        <div class="form-group">
        <label for="categories">Select Categories</label>
        <select class="js-example-basic-multiple" name="categories[]" multiple="multiple">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}} </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
        </div>

       @include('layouts.errors')

      </form>
</div>

@endsection

@section('select2js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
         placeholder: 'Select an option',
         width: '100%'
    });

    });
</script>
@endsection

@section('ckeditor')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection

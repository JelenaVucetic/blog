@extends('layouts.master')


@section('select2link')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection


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
        <select class="js-example-basic-multiple" name="categories[]" multiple="multiple">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}} </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
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

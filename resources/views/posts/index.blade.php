@extends('layouts.master')

@section('header')
    Welcome
@endsection

@section('content')

    @foreach ($posts as $post)

        @include('posts.post')

    @endforeach

    <div class="col-md-12">
        <div class="section-row">
            <button class="primary-button center-block">Load More</button>
        </div>
    </div>

@endsection

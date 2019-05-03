@extends('layouts.master')

@section('header')
    Your Blog Posts
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>

                <!-- post -->
                @if(count($posts) > 0)
                    @foreach ($posts as $post)
                        @include('posts.post')
                    {{-- <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

                    {!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'methof' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method' , 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!} --}}
                    @endforeach
                @else
                    <p>You have no posts.</p>
                @endif
                <!-- /post -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('content')


<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <h3>{{$post->title}}</h3>
                        <figure class="figure-img">
                            <img class="img-responsive" src="/images/post-4.jpg" alt="">
                            <figcaption>So Lorem Ipsum is bad (not necessarily)</figcaption>
                        </figure>
                        <p>{!!$post->body!!}</p>
                    </div>
                    <div class="post-shares sticky-shares">
                        <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                        <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>

                <!-- author -->
                <div class="section-row">
                    <div class="post-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/images/{{$post->author_image}}" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>{{$post->author}}</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /author -->

                <!-- comments -->
                <div class="section-row">
                    <div class="section-title">
                        <h2>3 Comments</h2>
                    </div>
                @if ($post->comments->count())
                    <div class="post-comments">
                        <!-- comment -->
                @foreach ($post->comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="./img/avatar.png" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4>{{$comment->name}}</h4>
                                    <span class="time">{{$comment->created_at->toFormattedDateString() }}</span>
                                    <a href="#" class="reply">Reply</a>
                                </div>
                                <p>{{$comment->body}}</p>
                            </div>
                        </div>
                @endforeach
                        <!-- /comment -->
                    </div>
                @endif
                </div>
                <!-- /comments -->

                <!-- reply -->
                <div class="section-row">
                    <div class="section-title">
                        <h2>Leave a reply</h2>
                        <p>your email address will not be published. required fields are marked *</p>
                    </div>
                    <form class="post-reply" method="POST" action="/posts/{{$post->id}}/comments">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>Name *</span>
                                    <input class="input" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>Email *</span>
                                    <input class="input" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="input" name="body" placeholder="Message" required></textarea>
                                </div>
                                <button class="primary-button">Submit</button>
                            </div>
                        </div>
                    </form>
                    @include('layouts.errors')
                </div>
                <!-- /reply -->
                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

                {!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'methof' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method' , 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
            <!-- /Post content -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection

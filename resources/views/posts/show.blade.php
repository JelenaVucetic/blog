@extends('layouts.master')

@section('edit_delete')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
        function changeLanguage(language) {
            var element = document.getElementById("url");
            element.value = language;
            element.innerHTML = language;
        }

        function showDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

@endsection

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
                        <div class="postTitle">
                            <h3>{{$post->title}}</h3>

                        @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)

                        <div class="dropdown">
                                <!-- three dots -->
                                <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown()">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <!-- menu -->
                                <div id="myDropdown" class="dropdown-content">
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

                                        {!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'methof' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method' , 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn deletebtn'])}}
                                        {!!Form::close()!!}
                                </div>
                            </div>
                            @endif
                        @endif
                        </div>

                        <figure class="figure-img">
                            <img class="img-responsive" src="/storage/images/{{$post->images->first()->name}}" alt="">
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
                                <img class="media-object" src="/images/author.png" alt="">

                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>{{$post->user->name}}</h3>
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
                        <h2>Comments</h2>
                    </div>
                @if ($post->comments->count())
                    <div class="post-comments">
                        <!-- comment -->
                @foreach ($post->comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/images/avatar.png" alt="">
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
            </div>
            <!-- /Post content -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection



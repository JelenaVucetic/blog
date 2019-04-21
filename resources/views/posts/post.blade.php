<!-- post -->

<div class="col-md-12">
    <div class="post post-row">
    <a class="post-img" href="/posts/{{$post->id}}"><img src="/storage/images/{{$post->images->first()->name}}" alt=""></a>
        <div class="post-body">
            <div class="post-meta">
                @foreach ($post->categories as $category)
            <a class="post-category cat-2" href="/categories/{{$category->id}}">{{$category->name}}</a>
                @endforeach
                <span class="post-date">{{$post->created_at->toFormattedDateString() }}</span>
            </div>
                <h3 class="post-title"><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
                <p> {{$post->body}}</p>
            </div>
    </div>
</div>
<!-- /post -->


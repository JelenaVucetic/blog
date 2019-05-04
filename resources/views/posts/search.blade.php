@extends('layouts.master')

@section('content')
    @if(isset($details))
        <p> The Search results <b> {{ $query }} </b> are :</p>
        <h2>Sample Post Details</h2>

            @foreach($details as $post)
            <div class="Rtable Rtable--4cols">
                <div class="Rtable-cell"><a href="/posts/{{$post->id}}"> {!!$post->title!!}</a></div>
                <div class="Rtable-cell">0 views</div>
                <div class="Rtable-cell">0 comments</div>
            </div>
            @endforeach
    @else
        <h3>No Details found! Please try to search again!</h3>
    @endif
@endsection

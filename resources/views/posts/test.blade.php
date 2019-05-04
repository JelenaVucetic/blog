@extends('layouts.master')

@section('content')
    @if(isset($details))
        <p> The Search results <b> {{ $query }} </b> are :</p>
        <h2>Sample Post Details</h2>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $post)
            <tr>
                <td>{{$post->title}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    @endif
@endsection

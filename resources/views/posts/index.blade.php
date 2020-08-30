@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <div>
        <a href="/posts/create" class="btn btn-primary">Create Post</a>
    </div>
    @if(count($posts)>0)

        <h1> Others Post</h1>
        @foreach($posts as $post)
            <div class="list">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/cover_images/{{$post->cover_images}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2><a href="/posts/{{$post->id}}">{{ $post->title}}</a></h2>
                        <div class="info">
                            {{ $post->content}}
                        </div>
                        <p> posted on {{$post->created_at}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No post found</p>
    @endif
@endsection

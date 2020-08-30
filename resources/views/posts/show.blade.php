@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{ $post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_images}}">
    <div class="info">
        {{ $post->content}}
    </div>
    <p> posted on {{$post->created_at}}</p>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open(['action'=>['PostController@destroy', $post->id], 'method'=> 'POST']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
    {!! Form::close() !!}
@endsection

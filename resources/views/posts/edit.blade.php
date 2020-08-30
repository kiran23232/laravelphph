@extends('layouts.app')

@section('content')
    @include ('includes.message-block')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'Post', 'enctype'=>'multipart/form-data'])!!}
        <div class="Form-group">
            {{ Form::label('title', 'Title')}}
            {{ Form::text('title', $post->title,['class'=> 'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="Form-group">
            {{ Form::label('content', 'content')}}
            {{ Form::textarea('content', $post->content,['class'=> 'form-control', 'placeholder'=>'Title'])}}
            <div class="Form-group">
                {{ Form::file('cover_image')}}
            </div>
            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
        {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}
@endsection

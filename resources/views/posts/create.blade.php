@extends('layouts.app')

@section('content')
    @include ('includes.message-block')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostController@store', 'method' => 'Post', 'enctype'=>'multipart/form-data'])!!}
        <div class="Form-group">
            {{ Form::label('title', 'Title')}}
            {{ Form::text('title', '',['class'=> 'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="Form-group">
            {{ Form::label('content', 'content')}}
            {{ Form::textarea('content', '',['class'=> 'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="Form-group">
            {{ Form::file('cover_image')}}
        </div>
        {{ Form::submit('Submit', ['class'=>"btn btn-primary"]) }}
    {!! Form::close() !!}
@endsection

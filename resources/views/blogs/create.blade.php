@extends('layouts.app')
@section('content')
    <h3>Create Blog</h3>
    {!! Form::open(['action'=>'BlogsController@store','method'=>'POST']) !!}
    {{Form::hidden('user_id', Auth::user()->id,['class'=>'form-control','placeholder'=>'Title'])}}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('content','Content')}}
        {{Form::textArea('content','',['class'=>'form-control','placeholder'=>'Content'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}

    {!! Form::close() !!}


@endsection


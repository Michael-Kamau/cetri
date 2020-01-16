@extends('layouts.app')
@section('content')
    <h3>Contact Us </h3>
    {!! Form::open(['action'=>'MainController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('question','Question')}}
        {{Form::textArea('question','',['class'=>'form-control','placeholder'=>'question'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}

    {!! Form::close() !!}


@endsection

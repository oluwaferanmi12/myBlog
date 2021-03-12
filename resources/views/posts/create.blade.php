@extends('layouts.app')

@section('content')
    
    <div class="container">

        {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store' , 'files' => 'true' ]) !!}
            <div class="form-group">
                {!! Form::label('title' , 'Title') !!}
                {!! Form::text('title' , null ,['class' => 'myClass form-control' , 'placeholder' => 'Enter Title Of Blog']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body' , 'Body') !!}
                {!! Form::textArea('body' , null ,['class' => 'myClass form-control' , 'placeholder' => 'Content of Blog']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body' , 'Body') !!}
                {!! Form::file('file' ,['class' => 'myClass form-control' , 'placeholder' => 'Content of Blog']) !!}
            </div>
            {!! Form::submit('Create'  , ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    
@endsection
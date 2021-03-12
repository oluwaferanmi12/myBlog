@extends('layouts.app')

@section('content')
    
    <div class="container">

        {!! Form::model($post , ['action' => ['App\Http\Controllers\PostsController@update', $post->id] , 'files' => 'true', 'method' => 'PUT' ]) !!}
            <div class="form-group">
                {!! Form::label('title' , 'Title') !!}
                {!! Form::text('title' , null ,['class' => 'myClass form-control' , 'placeholder' => 'Enter Title Of Blog']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body' , 'Body') !!}
                {!! Form::textArea('body' , null ,['class' => 'myClass form-control' , 'placeholder' => 'Content of Blog']) !!}
            </div>
            
            {!! Form::submit('Update'  , ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    
@endsection
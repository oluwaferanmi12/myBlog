@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} &nbsp; <span style='font-weight:bold'>{{$user->name}}</span>

                    <p>Would you like to create a new Post -------><span><a class='btn btn-primary' href="{{route('posts.create')}}">-Create Post</a></span></p>

                    <div class="posts">
                        @if (count($posts) > 0)
                        
                        @foreach ($posts as $post)
                                <h3 style='margin-top:20px'>Your Recent Posts(5)</h3>
                                
                                <h3>{{$post->title}}</h3>
                                <div class="index-img-container">
                                    <img src="{{$post->path}}" alt="" srcset="">
                                </div>
                                <p>{{ substr(strip_tags($post->body) ,0 , 100)}}</p>
                                <hr>
                                <a class="btn btn-info" href="{{route('posts.edit' , $post->id)}}">Edit Post</a>

                                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy' , $post->id] , 'method' => 'DELETE' , 'class' => 'auth-Form' ]) !!}
                                    {!! Form::submit('Delete Post' , ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                                <a class="btn btn-primary" href="{{route('posts.show' , $post->id)}}">View full Post</a>
                            @endforeach

                            @else 

                            <h3>You Have No posts</h3>
                        @endif

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

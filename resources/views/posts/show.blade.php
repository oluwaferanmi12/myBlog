@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{$post->title}}</h1>

                <div class="index-img-container" style="height: 400px">
                        <img style="height: 100%; width:90%" class="theImg" src="{{$post->path}}" alt="" srcset="">
                </div>



                <p>{!! $post->body !!}</p>

                {{-- Comment Section --}}
                
                <div class="addthis_inline_share_toolbox"></div>
                <div class="show-comments">
                    <h3>Comments Section</h3>
                    @foreach ($comments as $comment)
                        <div class="comment-detail">
                            
                            <p class='comment-content'>{{$comment->comment}}</p>
                            <p class="theTime"><span class='theEmail'>{{$comment->email}}</span> @ {{$comment->created_at}}</p>
                        </div>
                        <hr>
                    @endforeach

                </div>


                {!! Form::open(['action' => 'App\Http\Controllers\CommentsController@store']) !!}
                    <div class="form-group enter-comment">
                        {!! Form::hidden('post_id' , $post->id) !!}
                        {!! Form::label('comment' , 'Enter Comment' ) !!}
                        {!! Form::text('comment' ,null , ['class' =>'comment form-control'] ) !!}
                    </div>
                    <div class="form-group enter-comment">
                        
                        {!! Form::label('email' , 'Enter Email' ) !!}
                        {!! Form::text('email' ,null , ['class' =>'email form-control'] ) !!}
                    </div>

                    {!! Form::submit('Comment' , ['class' => 'btn btn-secondary']) !!}

                {!! Form::close() !!}

                
                    @if (Auth::check())
                        @if (Auth::id() === $post->user_id)
                            <div class="user-action">
                                <h2>Authorised User Only</h2>

                                <div class="actions">
                                    <a href="{{route('posts.edit', $post->id)}}"><div class="btn btn-info">Edit</div></a>
                                    &nbsp;

                                    {!! Form::open(['method' => 'DELETE' ,  'action' => ['App\Http\Controllers\PostsController@destroy' , $post->id]]) !!}
                                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger']) !!}

                                    {!! Form::close() !!}
                                </div>
                        
                            </div>
                        @endif
                    @endif
                
            </div>

            <div class="col-4">
                <h3>Recent Blog Posts(5)</h3>

                    @foreach ($allPosts as $recent)
                        <div class="index-img-container" >
                            <img src="{{$recent->path}}" alt="" srcset="">
                        </div>

                        <h3 style="padding-bottom: 30px"><a style='color:black; text-decoration:none;' href="{{route('posts.show' , $recent->id)}}">{{$recent->title}} </a>  </h3>


                    @endforeach
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <h1 class="post_title">{{$post->title}}</h1>

                <div class="index-img-container" style="height: 400px">
                        <img style="height: 100%; width:90%" class="theImg" src="{{$post->path}}" alt="" srcset="">
                </div>



                <p>{!! $post->body !!}</p>

                {{-- Comment Section --}}
                
                <div class="addthis_inline_share_toolbox"></div>
                <div class="show-comments">
                    <h3>Comments Section.</h3>
                    @foreach ($comments as $comment)
                        <div class="comment-detail">
                            <div class="avatar_container">
                                <div class="avatar_img"><i class="fas fa-user-tie" style='color:rgb(249, 155, 170); font-size:30px;'></i></div>
                                <div class='comment-content'>
                                    <p class="theTime">
                                        <span class='theEmail'>{{$comment->email}}</span> <span style="font-size: 20px; font-weight:bolder">.</span> &nbsp;{{$comment->created_at->diffForHumans()}}
                                    </p>
                                    {{$comment->comment}}
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                    @endforeach

                </div>


                {!! Form::open(['action' => 'App\Http\Controllers\CommentsController@store']) !!}
                    <div class="form-group enter-comment">
                        {!! Form::hidden('post_id' , $post->id) !!}
                        {!! Form::hidden('post_slug' , $post->slug) !!}
                        {!! Form::label('comment' , 'Enter Comment' ) !!}
                        {!! Form::text('comment' ,null , ['class' =>'comment form-control'] ) !!}
                    </div>
                    <div class="form-group enter-comment">
                        
                        {!! Form::label('email' ,'Avatar Name' ) !!}
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

            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h3 class="recent_title">Recent Blog Posts</h3>

                    @foreach ($allPosts as $recent)
                        <div class="index-img-container" style="height: 200px"  >
                            <img src="{{$recent->path}}" alt="" srcset="" style="height: 100%; width:100%">
                        </div>

                        <h3 style="padding-bottom: 30px"><a style='color:black; text-decoration:none;' href="{{route('posts.show' , $recent->id)}}">{{$recent->title}} </a>  </h3>


                    @endforeach
            </div>
        </div>
    </div>
@endsection
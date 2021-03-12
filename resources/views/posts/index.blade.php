@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-8">
                
                <h1 class="theH1">Blog Posts</h1>
            @foreach ($post as $posts)
                <div class="index-img-container">
                    <img class="theImg" src="{{$posts->path}}" alt="" srcset="">
                </div>
                <h3><a style='color:black; text-decoration:none;' href="{{route('posts.show' , $posts->id)}}">{{$posts->title}} </a>  </h3> 
                <p>{{ substr(strip_tags($posts->body) , 0, 100) }} ...</p>
                <p>Created at : {{$posts->created_at}}</p>
                    
                <a href="{{route('posts.show', $posts->id)}}">
                    <div class="btn btn-primary">
                    Read More
                    </div>
                </a>
                    &nbsp; &nbsp; 
                <span>{{$posts->comments()->count()}} Comments</span>
                <hr>
            @endforeach

            </div>

            <div class="col-lg-4">
                <h3>Recent Blog Posts(5)</h3>

                @foreach ($recents as $recent)
                    <div class="index-img-container">
                        <img src="{{$recent->path}}" alt="" srcset="">
                    </div>

                    <h3 style="padding-bottom: 30px"><a style='color:black; text-decoration:none;' href="{{route('posts.show' , $recent->id)}}">{{$recent->title}} </a></h3>


                @endforeach
            </div>
        </div>

        

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                
                <h1 class="theH1" style="padding-bottom:40px; text-align:center;" ><span>Blog Posts</span></h1>
            @foreach ($post as $posts)
                <div class="home-blog-container" data-aos="flip-up" data-aos-duration="3000">
                    <div class="index-img-container" style="height:400px">
                    <img class="theImg" style="height: 100%;" src="{{$posts->path}}" alt="" srcset="">
                    </div>
                    <h3><a style='color:black; text-decoration:none; font-weight:bold' href="{{route('posts.show' , $posts->id)}}">{{$posts->title}} </a>  </h3> 
                    <p>{{ substr(strip_tags($posts->body) , 0, 300) }} ...</p>
                    <p style="padding-bottom:0px; margin-bottom:0px; color:red;"> Posted {{$posts->created_at->diffForHumans()}}</p>
                    <div style="font-weight:normal; color:green; padding-bottom:12px; ">By {{$posts->user->name}} </div>
                        
                    <a href="{{route('posts.show', $posts->id)}}">
                        <div class="btn btn-primary">
                            
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                
            
                        Read More
                        </div>
                    </a>
                        &nbsp; &nbsp; 
                    <span>{{$posts->comments()->count()}} Comments</span>
                    <hr>
                </div>
            @endforeach

            </div>

            <div class="col-lg-4 sec-col">
                <h3 class="trending-head"><span>Trending</span></h3>

                @foreach ($recents as $recent)
                    <div class="recent-container">
                        <div class="index-img-container" style="height: 250px">
                        <img style="height: 100%; " src="{{$recent->path}}" alt="" srcset="">
                        </div>

                        <div style="font-size:24px; text-align:center"><a style='color:black; text-decoration:none;' href="{{route('posts.show' , $recent->id)}}">{{$recent->title}} </a></div>
                    </div>


                @endforeach
            </div>
        </div>

        

    </div>
@endsection

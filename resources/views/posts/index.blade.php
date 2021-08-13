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
                    <h3><a style='color:black; text-decoration:none; font-weight:bold' href="{{route('posts.show', $posts->slug)}}">{{$posts->title}} </a>  </h3> 
                    <p>{{ substr(strip_tags($posts->body) , 0, 300) }} ...</p>
                    <p style="padding-bottom:0px; margin-bottom:0px;">
                        <i class="far fa-clock"></i>  Posted {{$posts->created_at->diffForHumans()}}</p>
                    <div style="font-weight:normal; color:green; padding-bottom:12px; "><span style="color: black;"><i class="far fa-user"></i></span> By {{$posts->user->name}} </div>
                        
                        <a href="{{route('posts.show', $posts->slug)}}">
                            <div class="btn btn-primary">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            Read More
                            </div>
                        </a>

                    {{-- <form action="{{route('posts.show' , $posts->title)}}" method="GET">
                        
                        <div class="btn btn-primary">
                            <input type="hidden" name="id" value="{{$posts->id}}">
                            <input type="hidden" name="title" ,value="{{$posts->title}}">
                            <input type="submit" value="Read More">
                        </div>

                    </form> --}}
                        &nbsp; &nbsp; 
                    <span>
                        
                        {{$no_of_comment = $posts->comments()->count()}} 

                        @if ($no_of_comment <= 1 )
                            Comment
                        @else
                            Comments
                        @endif
                    
                    </span>
                    <hr>
                </div>
            @endforeach

            </div>

            <div class="col-lg-4 sec-col">
                <h3 class="trending-head"><span>Trending</span></h3>

                {{-- @foreach ($recents as $recent)
                    


                @endforeach --}}

                @if (count($recents) <= 5)
                    @foreach ($recents as $recent)
                        <div  style="font-size:24px; text-align:center"><a
                            class="recent_title_link" style='color:black; text-decoration:none;' href="{{route('posts.show' , $recents[$i]->id)}}">{{$recents[$i]->title}} </a>
                        </div>
                        <hr>
                    @endforeach
                
                @else 

                    @for ($i = 1; $i < 6; $i++)
                        <div class="recent-container" style="padding: 0px">
                            @if ($i == 1)
                                <div class="index-img-container" style="height:250px">
                                    <img style="height: 100%; " src="{{$recents[$i]->path}}" alt="" srcset="">
                                </div>
                            @endif

                            
                            <div  style="font-size:24px; text-align:center"><a
                                class="recent_title_link" style='color:black; text-decoration:none;' href="{{route('posts.show' , $recents[$i]->id)}}">{{$recents[$i]->title}} </a>
                            </div>
                            <hr>
                        </div>
                    @endfor

                @endif

                

            </div>
        </div>

        

    </div>
@endsection

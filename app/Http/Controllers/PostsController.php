<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index' , 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::orderBy('id' , 'desc')->limit(5)->get();

        $recents =Post::orderBy('id' , 'desc')->limit(5)->get();
        return view('posts.index' , compact('post' , 'recents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $post = $request->all();
        $post['user_id'] = $user_id;
        $theFile = $request->file('file');
        $file_name = $request -> file('file')->getClientOriginalName();
        $post['path']=$file_name;
        $theFile->move('images' , $file_name);
        $thePost = Post::create($post);
        $user->posts()->save($thePost);
        
        

        return redirect('posts');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $allPosts =Post::orderBy('id' , 'desc')->limit(10)->get();
        $post = Post::findOrFail($id);
        $comments = $post->comments()->orderBy('id' , 'desc')->get();
        
        return view('posts.show' , compact('post' , 'allPosts' , 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view ('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);
        
        
        $post->title =  $request['title'];
        $post->body = $request['body'];
        $post->save();

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('posts');
    }

}

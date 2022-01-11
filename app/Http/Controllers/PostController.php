<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Str;


class PostController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post,$slug)
    {

     return view('Posts.single')->with('postdata',Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $post = new Post;
        $post->title = $request->input('title');
        $slug = $request->input('title');
        $post_slug = Str::slug($slug);
        $post->slug = $post_slug;
        $post->body = $request->input('body');
        if ($request->hasfile('post_image')) {
            $file = $request->file('post_image');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('upload/post/',$filename);
            $post->post_image = $filename;
        } 
        $post->save();
        Session::flash('success','Data Inserted !');
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$posts = DB::table('posts')->get();
        $posts = Post::get();
        return view('Posts.index',compact('posts'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function all(Post $post)
    {
    
    	//$posts = DB::table('posts')->get();
        $posts = Post::get();
        return view('home', compact('posts'));
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,$id)
    {
     return view('Posts.edit')->with('PostArr',Post::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
  
        $post = Post::find($request->id);
        $post->title = $request->input('title');
        $post_slug = str::slug($request->input('title'));
        $post->slug = $post_slug;
        $post->body = $request->input('body');
           if ($request->hasfile('post_image')) {
            $destination = 'upload/post/'.$post->post_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('post_image');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('upload/post/',$filename);
            $post->post_image = $filename;
        } 
        $post->update();
        Session::flash('warning','Data Update !');
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,$id)
    {
       $postdelet = Post::find($id);
         $destination = 'upload/post/'.$postdelet->post_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $postdelet->delete();
        Session::flash('danger','Data Deleted !');
        return redirect('posts');
    }
}

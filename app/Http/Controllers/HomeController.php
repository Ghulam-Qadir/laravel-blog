<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Posts/index');
    }

    public function show(Post $post)
    {
        $posts = DB::table('posts')->get();
        //$posts = Post::get();
        return view('Posts.index',compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\querycrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Str;

class QuerycrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$slug)
    {
        $postdata  = DB::table('querycruds')->get()->where('slug',$slug)->first();
        return view('querycrud.single',compact('postdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('querycrud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title = $request->input('title');
        $slug = Str::slug($title);
        $body = $request->input('body');
        if ($request->hasfile('post_image')) {
            $file = $request->file('post_image');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('upload/post/',$filename);
            $post_image = $filename;
        }
        $post = DB::table('querycruds')->insert([
            'title' => $title,
            'slug' => $slug,
            'body' => $body,
            'post_image' => $post_image,
        
    ]);
     Session::flash('success','Data Inserted !');
        return redirect('queryposts');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\querycrud  $querycrud
     * @return \Illuminate\Http\Response
     */
    public function show(querycrud $querycrud)
    {
        $querycruds = DB::table('querycruds')->get();
        return view('querycrud.index',compact('querycruds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\querycrud  $querycrud
     * @return \Illuminate\Http\Response
     */
    public function edit(querycrud $querycrud,$id)
    {
        $querycruds = DB::table('querycruds')->find($id);
       return view('querycrud.edit')->with('PostArr',$querycruds);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\querycrud  $querycrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, querycrud $querycrud,$id)
    {
     $title = $request->input('title');
      $slug = Str::slug($title);
        $body = $request->input('body');
        if ($request->hasfile('post_image')) {
            $destination = 'upload/post/'.$post->post_image;
            if (File::exists($destination)) {
                file::delete($destination);
            }
            $file = $request->file('post_image');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('upload/post/',$filename);
            $post_image = $filename;
        }
        DB::table('querycruds')->where('id',$id)->update([
            'title' => $title,
            'slug' => $slug,
            'body' => $body,
            'post_image' => $post_image,
        
    ]);
     Session::flash('success','Data Inserted !');
        return redirect('queryposts');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\querycrud  $querycrud
     * @return \Illuminate\Http\Response
     */
    public function destroy(querycrud $querycrud,$id)
    {
        DB::table('querycruds')->where('id',$id)->delete();
         Session::flash('danger','Data Deleted !');
        return redirect('queryposts');
        //
    }
}

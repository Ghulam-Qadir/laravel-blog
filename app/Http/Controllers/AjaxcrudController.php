<?php

namespace App\Http\Controllers;

use App\Models\Ajaxcrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Str;

class AjaxcrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Ajax.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ajaxcrud = new Ajaxcrud;
        $ajaxcrud->title = $request->input('title');
        $slug = $request->input('title');
        $ajaxcrud_slug = Str::slug($slug);
        $ajaxcrud->slug = $ajaxcrud_slug;
        $ajaxcrud->body = $request->input('body');
        if ($request->hasfile('post_image')) {
            $file = $request->file('post_image');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('upload/ajaxposts/',$filename);
            $post->post_image = $filename;
        } 
        $ajaxcrud->save();
        Session::flash('success','Data Inserted !');
        return redirect('ajaxposts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function show(ajaxcrud $ajaxcrud)
    {
        $ajaxcrud = Ajaxcrud::get();
        return view('Ajax.index',compact('ajaxcrud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function edit(ajaxcrud $ajaxcrud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ajaxcrud $ajaxcrud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function destroy(ajaxcrud $ajaxcrud)
    {
        //
    }
}

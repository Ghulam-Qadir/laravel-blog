<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $images = $request->file('file');

            $gallery = new gallery;
            $file = $images;
            $extintion = $file->getClientOriginalExtension();
            $originalname = $file->getClientOriginalName();
            $filename = time().'-'.$originalname;
            $image_path = $file->move('upload/gallery/',$filename);
            $gallery->images_gallery = $image_path;
            $gallery->save();
                return response()->json([
                'status' => 200,
                'success' => 'images Data inserted successfuly !'
            ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(gallery $gallery)
    {
       $allimages = gallery::get();
       return view('gallery.gallery', compact('allimages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        //
    }
}

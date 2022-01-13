<?php
namespace App\Http\Controllers;
use App\Models\Ajaxcrud;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Str;

class AjaxcrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ajaxcrud $ajaxcrud,$slug)
    {
        return view('Ajax.single')->with('ajaxdata', Ajaxcrud::where('slug', $slug)->first());
    }

       public function all(ajaxcrud $ajaxcrud)
    {
        $ajaxcrud = Ajaxcrud::all();
        return view('ajaxdata', compact('ajaxcrud'));
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
        $validator = Validator::make($request->all(),[
            'title' =>' required|max:191',
            'body' =>' required|min:3|max:1000',
            'post_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        }else{

        $ajaxcrud = new Ajaxcrud;
        $ajaxcrud->title = $request->input('title');
        $slug = $request->input('title');
        $ajaxcrud_slug = Str::slug($slug);
        $ajaxcrud->slug = $ajaxcrud_slug;
        $ajaxcrud->body = $request->input('body');
        if($request->post_image != null) {
        if ($request->hasfile('post_image')) {
            $file = $request->file('post_image');
            $extintion = $file->getClientOriginalExtension();
            //$fileorginalname = $file->getClientOriginalName();
            $filename = time().'-'.$extintion;
            $image_path = $file->move('upload/ajaxposts/',$filename);
            $ajaxcrud->post_image = $image_path;
        } 
        }
        $ajaxcrud->save();
            return response()->json([
                'status' => 200,
                'success' => 'Ajax Data inserted successfuly !'
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function show(ajaxcrud $ajaxcrud)
    {
        $ajaxcrud = Ajaxcrud::all();
        return view('Ajax.index',compact('ajaxcrud'));
    }

    public function loaddata()
    {
        $ajaxcrud = Ajaxcrud::all();
        return response()->json([ 
            'data' => $ajaxcrud 
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function edit(ajaxcrud $ajaxcrud)
    {
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ajaxcrud $ajaxcrud)
    {
    
/*    $validator = Validator::make($request->all(),[
            'title' =>' required|max:191',
            'body' =>' required|min:3|max:1000',
            'post_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        }else{*/

        $ajaxcrud = Ajaxcrud::find($request->input('updateid'));
        $ajaxcrud->title = $request->input('title');
        $slug = $request->input('title');
        $ajaxcrud_slug = Str::slug($slug);
        $ajaxcrud->slug = $ajaxcrud_slug;
        $ajaxcrud->body = $request->input('body');
        if($request->post_image != null) {
        if ($request->hasfile('post_image')) {
             $destination = $ajaxcrud->post_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('post_image');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $image_path = $file->move('upload/ajaxposts/',$filename);
            $ajaxcrud->post_image = $image_path;
        } 
        }
        $ajaxcrud->update();
            return response()->json([
                'status' => 200,
                'success' => 'Ajax Data Update successfuly !'
            ]);
      /*  }*/
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ajaxcrud  $ajaxcrud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
    	// Ajaxcrud::destroy(array('id',$id));
     try {
     	  $ajaxcrud = Ajaxcrud::find($id);
     	  $destination = 'upload/ajaxposts/'.$ajaxcrud->post_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $ajaxcrud->delete();
     	return response()->json([
     	'status' => 200,
     	'massage' => 'Data Deleted'
     	]);
     } catch (Exception $e) {

    	return response()->json([
     	'status' => 400,
     	'massage' => $e->getMessage()
     	]);
     	
     }
    }
}
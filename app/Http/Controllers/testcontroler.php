<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testcontroler extends Controller
{
 function hoha(){
        echo "Hello";
 }
    
 function index(){
 	return view('Home');
 }

  function about(){
 	return view('about');
 }
 
 public function show(){
 	$data = ['Arslan','Zaid','Taha','Imad'];
 	//return view('about')->with('data', $data);
 	return view('about',compact('data'));
 }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class UserAuth extends Controller
{
    function loginUser(Request $request)
    {
    		 $email = $request->input('email');
    		 $password = $request->input('password');

    		 $result = DB::table('logins')->where('email',$email)->where('password',$password)->get();
   			if (isset($result[0]->id)) {
   				if ($result[0]->status == 1) {
   				$request->session()->put('BLOG_USER_ID',$result[0]->id);
   				return redirect('posts');
   				}else{
   				$request->session()->flash('msg','Account Deactivated');
   				return redirect('login');
   				}
   			}else{
   				$request->session()->flash('msg','Please Enter Valid Details');
   				return redirect('login');
   			}


    }
}

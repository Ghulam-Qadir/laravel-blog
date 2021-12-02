<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\QuerycrudController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class,'all'])->name('home');

Route::get('about', function(){
	return view('about');
});
Route::get('contact', function(){
	return view('contact');
});
Route::get('single/{slug}', [PostController::class,'index'])->name('single.post');
Route::get('querysingle/{slug}', [QuerycrudController::class,'index'])->name('querysingle.post');
/*Route::get('login', function(){
	return view('login');
});
Route::get('logout', function(){
	session()->forget('BLOG_USER_ID');
	return redirect('login');
});*/
/*Route::post('loginUser', [UserAuth::class,'loginUser']);*/
/*Route::get('/',[testcontroler::class, 'index']);
Route::get('about',[testcontroler::class, 'show']);*/
//Route::resource('posts', PostController::class);



Route::group(['middleware'=>['auth']],function(){



Route::get('create', [PostController::class,'create']);
Route::post('store', [PostController::class,'store']);
Route::get('posts', [PostController::class,'show']);
Route::get('edit/{id}', [PostController::class,'edit']);
Route::get('delete/{id}', [PostController::class,'destroy']);
Route::put('update/{id}', [PostController::class,'update'])->name('Post.update');


Route::get('querycreate', [QuerycrudController::class,'create']);
Route::post('querystore', [QuerycrudController::class,'store']);
Route::get('queryposts', [QuerycrudController::class,'show']);
Route::get('queryedit/{id}', [QuerycrudController::class,'edit']);
Route::get('querydelete/{id}', [QuerycrudController::class,'destroy']);
Route::put('queryupdate/{id}', [QuerycrudController::class,'update'])->name('queryupdate.update');

});
Auth::routes();

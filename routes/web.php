<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuth;

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

Route::get('/', function(){
	return view('Home');
});
Route::get('about', function(){
	return view('about');
});
Route::get('contact', function(){
	return view('contact');
});

Route::get('login', function(){
	return view('login');
});
Route::post('loginUser', [UserAuth::class,'loginUser']);
/*Route::get('/',[testcontroler::class, 'index']);
Route::get('about',[testcontroler::class, 'show']);*/
//Route::resource('posts', PostController::class);
Route::get('create', [PostController::class,'create']);
Route::post('store', [PostController::class,'store']);
Route::get('posts', [PostController::class,'show']);
Route::get('edit/{id}', [PostController::class,'edit']);
Route::get('delete/{id}', [PostController::class,'destroy']);
Route::put('update/{id}', [PostController::class,'update'])->name('Post.update');
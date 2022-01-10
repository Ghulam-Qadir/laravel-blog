<?php

use App\Http\Controllers\AjaxcrudController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuerycrudController;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;


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
	return view('blog');
});
Route::get('about', function(){
	return view('about');
});
Route::get('contact', function(){
	return view('contact');
});


Route::get('model-crud', [PostController::class,'all']);
Route::get('query-builder-crud', [QuerycrudController::class,'all']);


Route::get('single/{slug}', [PostController::class,'index'])->name('single');
Route::get('querysingle/{slug}', [QuerycrudController::class,'index']);



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

Route::get('ajaxcreate', [AjaxcrudController::class,'create'])->name('ajaxcreate');
Route::get('ajaxposts', [AjaxcrudController::class,'index'])->name('ajaxposts');
Route::get('ajaxpostsget', [AjaxcrudController::class,'loaddata'])->name('ajaxpostsget');
Route::post('ajaxstore', [AjaxcrudController::class,'store'])->name('ajaxstore');
Route::post('ajaxdel/{id}', [AjaxcrudController::class,'destroy']);
Route::post('ajaxupdate', [AjaxcrudController::class,'update'])->name('ajaxupdate');
});

Auth::routes();
<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/Admin', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('homeAdmin');



Route::get('/post/{slug}',[App\Http\Controllers\AdminPostsController::class,'post'])->name('home.post');

Route::group(['middleware'=>'admin'],function(){




    Route::get('/admin',[App\Http\Controllers\AdminController::class,'index'])->name('admin');

    
Route::resource('admin/users',App\Http\Controllers\AdminUsersController::class);

Route::resource('admin/posts',App\Http\Controllers\AdminPostsController::class);

Route::resource('admin/categories',App\Http\Controllers\AdminCategoriesController::class);

Route::resource('admin/media',App\Http\Controllers\AdminMediaController::class);


});

Route::resource('admin/comments',App\Http\Controllers\PostCommentsController::class);

Route::resource('admin/comments/replies',App\Http\Controllers\CommentRepliesController::class);

Route::post('/delete/media',[App\Http\Controllers\AdminMediaController::class,'deleteMedia']);

Route::group(['middleware'=>'auth'],function(){


    Route::resource('author',App\Http\Controllers\AuthorController::class);


});
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::group(['middleware'=>'admin'],function(){

    Route::get('/admin',function(){

        return view('admin.index');
    })->name('admin');

    
Route::resource('admin/users',App\Http\Controllers\AdminUsersController::class);

Route::resource('admin/posts',App\Http\Controllers\AdminPostsController::class);

Route::resource('admin/categories',App\Http\Controllers\AdminCategoriesController::class);

Route::resource('admin/media',App\Http\Controllers\AdminMediaController::class);
});


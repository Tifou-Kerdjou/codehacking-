<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function index(){
        $postCount = Post::count();
        $CommentCount = Comment::count();
        $CategoryCount = Category::count();
        return view('admin/index',compact('postCount','CommentCount','CategoryCount'));
    }
}

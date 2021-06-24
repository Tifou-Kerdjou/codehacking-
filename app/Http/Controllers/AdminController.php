<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function index(){
        $postCount = Post::count();
        $CommentCount = Comment::count();
        $CategoryCount = Category::count();
        $commentaprroved= Comment::where('is_active',1)->count();
        $repliesaprroved= CommentReply::where('is_active',1)->count();
        $repliesunaprroved= CommentReply::where('is_active',0)->count();
        $commentunaprroved= Comment::where('is_active',0)->count();
        return view('admin/index',compact('postCount','CommentCount','CategoryCount','commentaprroved','commentunaprroved','repliesaprroved','repliesunaprroved'));
    }
}

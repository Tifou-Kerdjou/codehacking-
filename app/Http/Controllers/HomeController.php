<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                
                $postCount = Post::count();
                $CommentCount = Comment::count();
                $CategoryCount = Category::count();
                return view('admin/index',compact('postCount','CommentCount','CategoryCount'));
            }
        }
            $posts = Post::paginate(2);
            $categories = Category::all();
            return view('home',compact('posts','categories'));
        }
    public function indexAdmin(){
                $posts = Post::paginate(2);
                $categories = Category::all();
                return view('home',compact('posts','categories'));

        }
         
    }


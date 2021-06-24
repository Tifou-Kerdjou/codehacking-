<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostCreateRequest;
use App\Models\Photo;
use App\Http\Requests\PostEditRequest;
use Illuminate\Support\Facades\Session;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     
        $user = Auth::user();
        $posts=$user->posts()->paginate(8);
        return view('author.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories= Category::pluck('name','id')->all();
        return view('author.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //
        $user= Auth::user();
        $input = $request->all();
        if($file =$request->file('photo_id')){

            $name= time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;

        }
        Session::flash('created_post','The Post has been created');
        $user->posts()->create($input);
        //Post::create($input);
        return redirect('author');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::findOrFail($id);
        $categories= Category::pluck('name','id')->all();
        
        return view('author.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $input = $request->all();
        if($file =$request->file('photo_id')){

            $name= time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;

        }
        Session::flash('Updated_post','The Post has been updated');

        $user= Auth::user();
        $user->posts()->whereId($id)->first()->update($input);
        
        Session::flash('Updated_post','The Post has been Updated');
        return redirect('author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        unlink(public_path().$post->photo->file);
        Photo::find($post->photo->id)->delete();
        $post->delete();

        Session::flash('deleted_post','The Post has been deleted');
        
        return redirect('author');
        //
    }
}

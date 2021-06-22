<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Photo;

use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photos=Photo::paginate(6);
        return view('admin.media.index',compact('photos'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.media.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('file');
        $name= time(). $file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
        
        Session::flash('created_photo','The Photo has been created');
        return back();


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
        $photo = Photo::findOrFail($id);
        return view('admin.media.edit',compact('photo')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $photo= Photo::findOrFail($id);
        unlink(public_path().$photo->file);
        $photo->delete();
        Session::flash('deleted_photo','The Photo has been Deleted');
        return redirect('admin/media');
    }
    public function deleteMedia(Request $request){


        // if(isset($request->delete_single)){
        //     $this->destroy($request->photo);
        //     Session::flash('deleted_photo','The Photo has been Deleted');
        
        // }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach($photos as $photo)
        {
            $photo->delete();
        }
        Session::flash('deleted_photo','The Photos has been Deleted');
        

    }
    return redirect('admin/media');
}
}

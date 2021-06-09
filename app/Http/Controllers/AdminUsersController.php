<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Models\Role;

use App\Models\Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles= Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        $input = $request->all();
        if($file =$request->file('photo_id')){

            $name= time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;

        }
       
       
       $input['password']=bcrypt($request->password);
       
       
       
       Session::flash('created_user','The User has been created');
        User::create($input);
        return redirect('admin/users');


        
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


        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        //
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {



        $user = User::findOrFail($id);
        $input = $request->all();
        if($file =$request->file('photo_id')){

            $name= time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;

        }
        if($input['password'] == null){
            $input['password'] = $user->password;
        }

        $input['password'] = bcrypt($input['password']);

        Session::flash('Updated_user','The User has been updated');

        $user->update($input);
        
        return redirect('admin/users');

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


        $user=User::findOrFail($id);
        unlink(public_path().$user->photo->file);
        $user->delete();

        Session::flash('deleted_user','The User has been deleted');
        
        return redirect('admin/users');
        //
    }
}

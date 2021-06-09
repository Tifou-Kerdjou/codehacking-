@extends('layouts.admin')


@section('content')


@if (Session::has('deleted_user'))
<div class="alert alert-danger alert-dismissible  show" role="alert">
   {{session('deleted_user')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif
@if (Session::has('Updated_user'))
<div class="alert alert-info alert-dismissible  show" role="alert">
   {{session('Updated_user')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
  
@endif
@if (Session::has('created_user'))
<div class="alert alert-success alert-dismissible  show" role="alert">
   {{session('created_user')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif


<h1>Users</h1>

<table class="table"> 
<tr> 
<th>ID</th> 
<th>Photo</th> 
<th>Name</th> 
<th>Email</th>
<th>Role</th>
<th>Status</th>
<th>Created </th>
<th>Updated</th>
 </tr>
 
 @if ($users)


 @foreach ($users as $user)

 <tr> 
    <td>{{$user->id}}</td> 
    <td><img height="50" src="{{$user->photo ? $user->photo->file : "/images/default.jpg"}}" alt=""></td>
     <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td> 
    <td>{{$user->email}}</td>
    <td>{{$user->role->name}}</td> 
    <td>{{$user->is_active == 1 ? 'Active' : ' No Active' }}</td> 
    <td>{{$user->created_at->diffForHumans()}}</td> 
    <td>{{$user->updated_at->diffForHumans()}}</td> 
    </tr> 
     
 @endforeach
     
 @endif




</table>

@stop
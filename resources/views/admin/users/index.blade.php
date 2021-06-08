@extends('layouts.admin')


@section('content')


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
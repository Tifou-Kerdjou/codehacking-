@extends('layouts.admin')



@section('content')

@if (Session::has('deleted_post'))
<div class="alert alert-danger alert-dismissible  show" role="alert">
   {{session('deleted_post')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif
@if (Session::has('Updated_post'))
<div class="alert alert-info alert-dismissible  show" role="alert">
   {{session('Updated_post')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
  
@endif
@if (Session::has('created_post'))
<div class="alert alert-success alert-dismissible  show" role="alert">
   {{session('created_post')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif

<h1>Posts</h1>
<table class="table"> 
    <tr> 
    <th>ID</th> 
    <th>Photo</th> 
    <th>Title</th> 
    <th>Owner</th>
    <th>Category</th>
    <th>Created </th>
    <th>Updated</th>
     </tr>
     
     @if ($posts)
    
    
     @foreach ($posts as $post) 
    
     <tr> 
        <td>{{$post->id}}</td> 
        <td><img height="50" src="{{$post->photo ? $post->photo->file : "/images/default.jpg"}}" alt=""></td>
         <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td> 
        
        <td>{{$post->user->name}}</td>
        <td>{{$post->category->name}}</td> 
        <td>{{$post->created_at->diffForHumans()}}</td> 
        <td>{{$post->updated_at->diffForHumans()}}</td> 
        </tr> 
         
     @endforeach
         
     @endif
    
    
    
    
    </table>
    
    

@stop
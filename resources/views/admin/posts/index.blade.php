@extends('layouts.admin')



@section('content')

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
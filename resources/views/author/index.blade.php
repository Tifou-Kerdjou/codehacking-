@extends('layouts.blog1-home')


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

<h1>My Posts</h1>
<table class="table"> 
    <tr> 
    <th>ID</th> 
    <th>Photo</th> 
    <th>Title</th> 
    <th>Category</th>
    <th>Created </th>
    <th>Updated</th>
     </tr>
     
     @if ($posts)
    
    
     @foreach ($posts as $post) 
    
     <tr> 
        <td>{{$post->id}}</td> 
        <td><img height="50" src="{{$post->photo ? $post->photo->file : "/images/default.jpg"}}" alt=""></td>
         <td><a href="{{route('author.edit',$post->id)}}">{{$post->title}}</a></td> 
        
        <td>{{$post->category->name}}</td> 
        <td>{{$post->created_at->diffForHumans()}}</td> 
        <td>{{$post->updated_at->diffForHumans()}}</td> 
        <td> <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>  
        </tr> 
         
     @endforeach
         
     @endif
    
    </table>
    

    <a href=" {{route('author.create')}} " class="btn btn-primary col-sm-2 col-sm-offset-5"> create post</a>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-5">
        {{ $posts->render()   }}
      </div>
    </div>



@stop

@section('scripts')

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "admin/posts";
    };
</script>


@stop
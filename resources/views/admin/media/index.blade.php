@extends('layouts.admin')



@section('content')
@if (Session::has('deleted_photo'))
<div class="alert alert-danger alert-dismissible  show" role="alert">
   {{session('deleted_photo')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif

<h1>Media</h1>

<table class="table"> 
    <tr> 
    <th>ID</th> 
    <th>Photo</th> 
    <th>path</th> 
    <th>Created </th>
    <th>Delete</th>
     </tr>
     
     @if ($photos)
    
    
     @foreach ($photos as $photo) 
    
     <tr> 
        <td>{{$photo->id}}</td> 
        <td><img height="50" src="{{$photo->file}}" alt=""></td>
         <td>{{$photo->file}}</td> 
        
        <td>{{$photo->created_at->diffForHumans()}}</td> 
        <td>

            {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AdminMediaController@destroy',$photo->id]]) !!}

            {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}

        </td>
        </tr> 
         
     @endforeach
         
     @endif


@stop
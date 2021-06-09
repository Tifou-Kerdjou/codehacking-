@extends('layouts.admin')



@section('content')



@if (Session::has('deleted_category'))
<div class="alert alert-danger alert-dismissible  show" role="alert">
   {{session('deleted_category')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif
@if (Session::has('Updated_category'))
<div class="alert alert-info alert-dismissible  show" role="alert">
   {{session('Updated_category')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
  
@endif
@if (Session::has('created_category'))
<div class="alert alert-success alert-dismissible  show" role="alert">
   {{session('created_category')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif

<h1>Categories</h1>
<table class="table"> 
    <tr> 
    <th>ID</th> 
    <th>name</th> 
    
    <th>Created </th>
    <th>Updated</th>
     </tr>
     
     @if ($categories)
    
    
     @foreach ($categories as $category) 
    
     <tr> 
        <td>{{$category->id}}</td> 
        <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
        <td>{{$category->created_at->diffForHumans()}}</td> 
        <td>{{$category->updated_at->diffForHumans()}}</td> 
        </tr> 
         
     @endforeach
         
     @endif
    
    
    
    
    </table>
    


@stop
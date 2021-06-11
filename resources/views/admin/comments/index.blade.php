@extends('layouts.admin')


@section('content')


<h1> Comments</h1>

<table class="table"> 

<tr> 
<th>ID</th> 
<th>Author</th> 
<th>Email</th>
<th>comment</th>
 </tr> 
@foreach ($comments as $comment)
<tr> 
    <td> {{$comment->id}} </td> 
     <td>{{$comment->author}}</td> 
    <td>{{$comment->email}}</td> 
    <td>{{$comment->body}}</td>
    <td><a href="{{route('home.post',$comment->post->slug)}}">View Post</a></td>
    <td>

        @if ($comment->is_active == 1 )
        {!! Form::open(['method'=>"PATCH",'action'=>["App\Http\Controllers\PostCommentsController@update",$comment->id]]) !!}
        <input type="hidden" name="is_active" value="0">

        {!! Form::submit('Unapprouve', ['class'=>'btn btn-info']) !!}

        {!! Form::close() !!}

        
        @else
        {!! Form::open(['method'=>"PATCH",'action'=>["App\Http\Controllers\PostCommentsController@update",$comment->id]]) !!}
        <input type="hidden" name="is_active" value="1">

        {!! Form::submit('Approuve', ['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}

        @endif
        
        


    </td>
    <td>
        {!! Form::open(['method'=>"DELETE",'action'=>["App\Http\Controllers\PostCommentsController@destroy",$comment->id]]) !!}
        

        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </td>
    
</tr> 
    
@endforeach


</table>

@stop
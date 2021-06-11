@extends('layouts.admin')


@section('content')


<h1> Replies</h1>

<table class="table"> 

<tr> 
<th>ID</th> 
<th>Author</th> 
<th>Email</th>
<th>comment</th>
 </tr> 
@foreach ($replies as $reply)
<tr> 
    <td> {{$reply->id}} </td> 
     <td>{{$reply->author}}</td> 
    <td>{{$reply->email}}</td> 
    <td>{{$reply->body}}</td>
    <td><a href="{{route('home.post',$reply->comment->post->slug)}}">View Post</a></td>
    <td>

        @if ($reply->is_active == 1 )
        {!! Form::open(['method'=>"PATCH",'action'=>["App\Http\Controllers\CommentRepliesController@update",$reply->id]]) !!}
        <input type="hidden" name="is_active" value="0">

        {!! Form::submit('Unapprouve', ['class'=>'btn btn-info']) !!}

        {!! Form::close() !!}

        
        @else
        {!! Form::open(['method'=>"PATCH",'action'=>["App\Http\Controllers\CommentRepliesController@update",$reply->id]]) !!}
        <input type="hidden" name="is_active" value="1">

        {!! Form::submit('Approuve', ['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}

        @endif
        
        


    </td>
    <td>
        {!! Form::open(['method'=>"DELETE",'action'=>["App\Http\Controllers\CommentRepliesController@destroy",$reply->id]]) !!}


        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </td>
    
</tr> 
    
@endforeach


</table>

@stop
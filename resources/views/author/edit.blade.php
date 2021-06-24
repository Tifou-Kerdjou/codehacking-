@extends('layouts.blog1-home')



@section('content')

<h1>Edit Post</h1>
<div style="margin-left: 8%" >
<div class="row">
    @include('includes.form_error')
</div>

<div class="col-sm-3">
    <img src="{{$post->photo ? $post->photo->file : "/images/default.jpg"}}" class="img-responsive img-rounded" alt="">
</div>

<div class="col-sm-9">

{!! Form::model($post,['method'=>'PATCH','action'=>['App\Http\Controllers\AuthorController@update',$post->id],'files'=>true]) !!}


<div class="form-group">
    {!! Form::label('title', 'Title :') !!}

    {!! Form::text('title', null, ['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category : ') !!}

    {!! Form::select('category_id',[''=>'Choose Option']+$categories ,null, ['class'=>'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('photo_id', 'Photo : ') !!}
    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('body', 'Description :') !!}

    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::submit("Update Post", ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
    
</div>
    {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AuthorController@destroy',$post->id]]) !!}

    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}




    
</div>
</div>

@stop
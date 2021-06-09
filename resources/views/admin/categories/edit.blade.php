@extends('layouts.admin')



@section('content')


<h1>Edit Category</h1>
{!! Form::model($category,['method'=>'PATCH','action'=>['App\Http\Controllers\AdminCategoriesController@update',$category->id],'files'=>true]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name :') !!}

    {!! Form::text('name', null, ['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::submit("Update Category", ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
    
</div>
    {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AdminCategoriesController@destroy',$category->id]]) !!}

    {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}




@stop
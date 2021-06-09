@extends('layouts.admin')



@section('content')


<h1>Create Category</h1>
{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\AdminCategoriesController@store']) !!}

@include('includes.form_error')
<div class="form-group">
    {!! Form::label('name', 'Name :') !!}

    {!! Form::text('name', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::submit("Create Category", ['class'=>'btn btn-primary']) !!}


</div>

    {!! Form::close() !!}

    
@stop

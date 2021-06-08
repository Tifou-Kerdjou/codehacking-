@extends('layouts.admin')


@section('content')


<h1>Create User</h1>

{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\AdminUsersController@store','files'=>true]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name :') !!}

    {!! Form::text('name', null, ['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('email', 'Email : ') !!}

    {!! Form::email('email', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('role_id', 'Role : ') !!}

    {!! Form::select('role_id',[''=>'Choose Option']+$roles ,null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status : ') !!}

    {!! Form::select('is_active', array(1=>'Active',0=>'No Active'),0, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('password', 'Password : ') !!}

    {!! Form::password('password', ['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Picture : ') !!}
    {!! Form::file('photo_id',['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::submit("Create User", ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}



 @include('includes.form_error')
    
</div>






@stop
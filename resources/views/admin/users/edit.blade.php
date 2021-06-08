@extends('layouts.admin')


@section('content')


<h1>Edit User</h1>
<div class="row">
    @include('includes.form_error')
</div>

<div class="col-sm-3">
    <img src="{{$user->photo ? $user->photo->file : "/images/default.jpg"}}" class="img-responsive img-rounded" alt="">
</div>

<div class="col-sm-9">

{!! Form::model($user,['method'=>'PATCH','action'=>['App\Http\Controllers\AdminUsersController@update',$user->id],'files'=>true]) !!}


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

    {!! Form::select('is_active', array(1=>'Active',0=>'No Active'),null, ['class'=>'form-control']) !!}

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
    {!! Form::submit("Update User", ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>



    
</div>






@stop
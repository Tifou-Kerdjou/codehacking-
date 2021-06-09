@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" integrity="sha512-WvVX1YO12zmsvTpUQV8s7ZU98DnkaAokcciMZJfnNWyNzm7//QRV61t4aEr0WdIa4pe854QHLTV302vH92FSMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@stop

@section('content')


@if (Session::has('created_photo'))
<div class="alert alert-success alert-dismissible  show" role="alert">
   {{session('created_photo')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif


<h1>Upload Media</h1>



{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminMediaController@store','class'=>'dropzone']) !!}
@if (Session::has('created_photo'))
<div class="alert alert-success alert-dismissible  show" role="alert">
   {{session('created_photo')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif



{!! Form::close() !!}


   @stop

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js" integrity="sha512-llCHNP2CQS+o3EUK2QFehPlOngm8Oa7vkvdUpEFN71dVOf3yAj9yMoPdS5aYRTy8AEdVtqUBIsVThzUSggT0LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop
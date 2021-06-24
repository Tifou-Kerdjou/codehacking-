 @extends('layouts.blog1-home')




 @section('content')

 <h1>Create Post</h1>
<div style="margin-left: 8%" >

@include('includes.form_error')

{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\AuthorController@store','files'=>true]) !!}


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
    {!! Form::submit("Create Post", ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>

 @stop
 @section('scripts')

 <script>
    // Doing this in a loaded JS file is better, I put this here for simplicity
    $('#body').trumbowyg();
</script>

@stop
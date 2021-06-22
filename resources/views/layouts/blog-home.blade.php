



@extends('layouts.blog1-home')
@section('content')

<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

           @foreach ($posts as $post)
           <h2>
            <a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a>
        </h2>
        <p class="lead">
            by {{$post->user->name}}
        </p>
        <p><span class="glyphicon glyphicon-time"></span>  Posted {{$post->created_at->diffForHumans()}}</p>
        <hr>
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">
        <hr>
        <p>{{$post->body}}</p>
        <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
               
           @endforeach

            <!-- First Blog Post -->
           

            <!-- Second Blog Post -->
           

            <!-- pagination -->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                  {{ $posts->render()   }}
                </div>
              </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
@include('includes.home_side')

    </div>
    <!-- /.row -->

    <hr>


@stop
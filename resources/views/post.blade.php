@extends('layouts.blog-post')


@section('content')



                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by {{$post->user->name}}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body}}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">


                    {!! Form::open(['method'=>"POST",'action'=>"App\Http\Controllers\PostCommentsController@store",'class'=>'h4']) !!}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    {!! Form::label('body', 'Leave a Comment :') !!}

                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}
                    
                    {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}

                    {!! Form::close() !!}


                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach ($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="60" src=" {{$comment->photo}} " alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}

                        @foreach ($comment->replies as $reply)
                            
                        
                    
                        @if ($reply->is_active == 1)
                            
                        
                        
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="30"  src="{{$reply->photo}} " alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$reply->body}}
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="well">


                            {!! Form::open(['method'=>"POST",'action'=>"App\Http\Controllers\CommentRepliesController@store"]) !!}
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            {!! Form::label('body', 'Leave a Reply :') !!}
        
                            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1]) !!}
                            
                            {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
        
                            {!! Form::close() !!}
        
        
                        </div>

                    </div>
                    
                </div>
                    
                @endforeach
                

            


@stop
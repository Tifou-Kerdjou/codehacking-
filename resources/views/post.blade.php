@extends('layouts.blog-post')


@section('content')



                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
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
                @foreach ($post->comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="60" src="/images/default.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        {{$comment->body}}
                    </div>
                </div>
                    
                @endforeach
                

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>



@stop
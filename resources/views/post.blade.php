{{--AdminPostController--}}

@extends('layouts.blog-post')


@section('content')



                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                by <a href="#">{{$post->user->name}}</a> {{-- here we use relation user() in Post model ! --}}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img  height="200" src="/images/{{$post->photo->file}}" alt="">


              
               
             <hr> {{--    staritght line , thematic brake cool feeture--}}

                <!-- Post Content -->

                <p class="lead">{{$post->body}}</p>

                <hr>

                @if(Session::has('comment_message'))
                    {{session('comment_message')}}
                @endif


                <!-- Blog Comments -->
                @if(Auth::check())


                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        {!!Form::open(['method'=>'POST','action'=>'PostCommentController@store'])!!}

                        {{--   OBTAINING ID DIFERENT WAY:--}}

                                <input type="hidden" name="post_id" value="{{$post->id}}">


                                <div class="form-group">
                                    {!!Form::label('body','*')!!}
                                    {!!Form::textarea('body',null,['class'=>'form-control','rows'=>3])!!}
                                </div>

                                <div class="form-group">
                                    {!!Form::submit('Post Comment',['class'=>'btn btn-primary'])!!}
                                </div>

                        {!!Form::close()!!}

                    </div>

                @endif

                <hr>

                <!-- Posted Comments -->

                @if(count($comments)>0)
{{--            we are passing $comments from AdminPostController@post along with $post--}}

                    @foreach($comments as $comment)
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img height="64" src="/images/{{$comment->photo}}" alt="">
                            
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at->diffForHumans()}}</small>
                            </h4>
                            <p>{{$comment->body}}</p>
                        </div>
                    </div>

                    @endforeach

                @endif

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
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


              
               
             <hr> {{--    staritght html line , thematic brake cool feeture--}}




                <!-- Original Post Content -->

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


                <!-- Display Posted Comments -->

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
                            
                            
                            
                    <!-- Nested Comment (Reply) -->

                    @if(count($comment->replies) > 0)

                        @foreach($comment->replies as $reply)

                            <div id="nested-media" class="media">
                                <a class="pull-left" href="#">
                                    <img height="64" src="/images/{{$comment->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>

                                    <p>{{$reply->body}}</p>

                                </div>

                                {!!Form::open(['method'=>'POST','action'=>'CommentReplieController@createReplyStore'])!!}

                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">        

                                        <div class="form-group">
                                            {!!Form::label('body','*')!!}
                                            {!!Form::textarea('body',null,['class'=>'form-control','rows'=>2])!!}
                                        </div>

                                        <div class="form-group">
                                            {!!Form::submit('Submit Yor Reply',['class'=>'btn btn-primary'])!!}
                                        </div>
                                        @if(Session::has('comment_reply'))
                                            {{session('comment_reply')}}
                                        @endif
                                {!!Form::close()!!}

                            @endforeach
                    @endif
                                    

                            </div>
                        <!-- End Nested Comment -->
                        </div>
                    </div>

                    @endforeach

                @endif




@stop
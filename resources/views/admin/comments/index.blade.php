@extends('layouts.admin')

@section('content')


@if(count($comments) > 0)

    <h1>Comments</h1>

    <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Post Title</th>
                <th>Comments</th>
                  <th></th>
              </tr>
            </thead>
        @foreach($comments as $comment)
            <tbody>
                
              <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td><a href="{{route('home.post',$comment->post->id)}}">{{$comment->post->title}}</a></td>
                <td>{{$comment->body}}</td> 
                <td><a href="{{route('admin.comments.replies.show',$comment->id)}}">View Reply</a></td>
                  
                <td>
                    @if($comment->is_active==1)  

                        {!!Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]])!!}

                                <input type="hidden" name="is_active" value="0">

                                <div class="form-group">
                                    {!!Form::submit('Un-approve',['class'=>'btn btn-primary'])!!}
                                </div>


                        {!!Form::close()!!}


                        @else
                    
                    
                        {!!Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]])!!}

                                <input type="hidden" name="is_active" value="1">

                                <div class="form-group">
                                    {!!Form::submit('Aprove',['class'=>'btn btn-primary'])!!}
                                </div>


                        {!!Form::close()!!}


                     @endif
                
                </td>
                  
                  
                  <td>
                  
                    {!!Form::open(['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id]])!!}
                        {!!Form::submit('Delete Comment',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                  
                      
                  </td>
              </tr>

            </tbody>
        @endforeach
        
        
    </table>

@endif



@stop
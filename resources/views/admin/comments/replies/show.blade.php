
@extends('layouts.admin')

@section('content')


@if(count($replies) > 0)

    <h1>show.comment.replies</h1>

    <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Replies</th>
              </tr>
            </thead>
        @foreach($replies as $reply)
            <tbody>
                
              <tr>
                <td>{{$reply->id}}</td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->email}}</td>
                  <td>{{$reply->body}}</td>  
                <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
                
                  
                <td>
                    @if($reply->is_active==1)  

                        {!!Form::open(['method'=>'PATCH','action'=>['CommentReplieController@update',$reply->id]])!!}

                                <input type="hidden" name="is_active" value="0">

                                <div class="form-group">
                                    {!!Form::submit('Un-approve',['class'=>'btn btn-primary'])!!}
                                </div>


                        {!!Form::close()!!}


                        @else
                    
                    
                        {!!Form::open(['method'=>'PATCH','action'=>['CommentReplieController@update',$reply->id]])!!}

                                <input type="hidden" name="is_active" value="1">

                                <div class="form-group">
                                    {!!Form::submit('Aprove',['class'=>'btn btn-primary'])!!}
                                </div>


                        {!!Form::close()!!}


                     @endif
                
                </td>
                  
                  
                  <td>
                  
                    {!!Form::open(['method'=>'DELETE','action'=>['PostCommentController@destroy',$reply->id]])!!}
                        {!!Form::submit('Delete Comment',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                  
                      
                  </td>
              </tr>

            </tbody>
        @endforeach
        
        
    </table>

@endif



@stop
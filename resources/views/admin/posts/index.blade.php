@extends('layouts.admin')

 
 
@section('content')
 
 
    <h1>Admin.Posts.Index</h1>

    <table class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Body</th>
                <th>User_id</th>
                <th>Category_id</th>
                <th>Photo_id</th>
                <th>Created_at</th>
                <th>Updated_at</th>
              </tr>
            </thead>
        
            <tbody>
                @if($post)
                    @foreach($post as $postData)
                      <tr>
                        <td>{{$postData->title}}</td>
                        <td>{{$postData->body}}</td>
                        <td>{{$postData->user_id}}</td>
                        <td>{{$postData->category_id}}</td>
                        <td>{{$postData->photo_id}}</td>
                        <td>{{$postData->created_at}}</td>
                        <td>{{$postData->updated_at}}</td>  
                      </tr>
                    @endforeach
                @endif
                {{No data}}

            </tbody>
    </table>
    
@stop
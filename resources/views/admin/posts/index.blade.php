@extends('layouts.admin')


@section('content')
 
 
    <h1>Admin.Posts.Index</h1>

    <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>User</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created_at</th>
                <th>Updated_at</th>
              </tr>
            </thead>
        
            <tbody>
                @if($post)
                    @foreach($post as $postData)
                      <tr>
                        <td>{{$postData->id}}</td>
                        <td>{{$postData->user->name}}</td>{{-- user is a relation--}}
                        <td>{{$postData->category_id}}</td>
                        
                <td><img height="80" src="/images/{{$postData->photo ? $postData->photo->file : 'placehold.jpg'}}" alt=""></td>
                          
                        <td>{{$postData->title}}</td>
                        <td>{{$postData->body}}</td>            
                        <td>{{$postData->created_at->diffForHumans()}}</td>
                        <td>{{$postData->updated_at->diffForHumans()}}</td>  
                      </tr>
                    @endforeach
                @endif

            </tbody>
    </table>
    
@stop
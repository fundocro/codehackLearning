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
                        <td>{{$postData->category ? $postData->category->name : 'Uncategorised'}}</td>
                        
                <td><img height="80" src="/images/{{$postData->photo ? $postData->photo->file : 'placehold.jpg'}}" alt=""></td>
                          
                        <td><a href="{{route('admin.posts.edit',$postData->id)}}">{{$postData->title}}</a></td>
                          
                {{-- ($postData->id) finds id  / pass id to  / admin.posts.edit --}}
                {{-- in admin.posts.edit / form uses that id and refers to AdminPostController  --}}
                {{-- AdminPostController uses that id to find matching post and returns back belonging values true compact() --}}
                          
                          
                        <td>{{str_limit($postData->body,10)}}</td> {{--shows only 10characters of body text--}}
                            {{--HELPER FUNCTIONS https://laravel.com/docs/4.2/helpers          --}}
                        <td>{{$postData->created_at->diffForHumans()}}</td>
                        <td>{{$postData->updated_at->diffForHumans()}}</td>  
                      </tr>
                    @endforeach
                @endif

            </tbody>
    </table>
    
@stop
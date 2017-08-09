

@extends('layouts.admin')

@section('content')

<h1>admin/posts/edit</h1>

<div class="row">
    
                {{-- ($postData->id) finds id  / pass id to  / admin.posts.edit --}}
                {{-- in admin.posts.edit / form uses that id and refers to AdminPostController  --}}
                {{-- AdminPostController uses that id to find matching post and returns back belonging values true compact() --}}
                          
    
    {!!Form::model($posts,['method'=>'PATCH','action'=>['AdminPostController@update',$posts->id],'files'=>true])!!}

            <div class="form-group">
                {!!Form::label('title','Title:')!!}
                {!!Form::text('title',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('category_id','Category:')!!}
                {!!Form::select('category_id',$category,null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('photo_id','Photo:')!!}
                {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('body','Description:')!!}
                {!!Form::textarea('body',null,['class'=>'form-control','rows'=>9])!!}
            </div>

    
            <div class="form-group">
                {!!Form::submit('Edit Post',['class'=>'btn btn-primary'])!!}
            </div>
    
            
                {!!Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$posts->id]])!!}
                    <div class="form-group">
                            {!!Form::submit('Delete post',['class'=>'btn btn-danger'])!!}
                    </div>
                {!!Form::close()!!}
        


            
    {!!Form::close()!!}
    
</div>

<div class="row">
    @include('includes.errors')
</div>



@endsection
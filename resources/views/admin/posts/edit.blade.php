

@extends('layouts.admin')

@section('content')

<h1>admin/posts/edit</h1>

<div class="row">
    
    
    <div class="col-sm-9">{{--picture sm-9 --}}
        <img height="250" src="/images/{{$posts->photo->file}}" alt="" >
        {{--$posts comes from AdminPostsController--}}
        {{--  photo comes from Post model--}}
        {{-- file is a part of photo--}}
        
    </div>
    
    
    
    <div class="col-sm-9">


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
        
    

        {!!Form::close()!!}
        
        
{{--        PUT DELETE BUTTON OUTSIDE MAIN FORM IF IT GIVES PROBLEMS--}}
        
             {!!Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$posts->id]])!!}
            <div class="form-group">
                {!!Form::submit('Delete Post',['class'=>'btn btn-danger'])!!}
            </div>
            {!!Form::close()!!}
        

    </div>{{--close second sm-9--}}
    

</div>{{--close row --}}

<div class="row">
    @include('includes.errors')
</div>



@endsection
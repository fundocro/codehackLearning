@extends('layouts.admin')

@section('content')
    <h1>Admin.users.Edit</h1>


<div class="col-sm-3">
    
    <img src="/images/{{$user->photo ? $user->photo->file : 'palcehold.jpg'}}" class="img-responsive img-rounded"  alt="">
    
</div>

    
<div class="col-sm-9">
    
        {!!Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>true])!!}

    
    
        <div class="form-group">
            {!!Form::label('name','Name:')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('email','Email:')!!}
            {!!Form::text('email',null,['class'=>'form-control'])!!}
        </div>



        <div class="form-group">
            {!!Form::label('role_id','Role:')!!}
            {!!Form::select('role_id',$roles,null,['class'=>'form-control'])!!}
        </div>
        

        <div class="form-group">
            {!!Form::label('is_active','Status:')!!}
            {!!Form::select('is_active',array(1=>'Active',0=>'NotActive'),null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('photo_id','Photo:')!!}
            {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
        </div>
        
        <div class="form-group">
            {!!Form::label('password','Password:')!!}
            {!!Form::password('password',null,['class'=>'form-control'])!!}
        </div>
        


        
        <div class="form-group">
            {!!Form::submit('Save Changes',['class'=>'btn btn-primary'])!!}
        </div>

    {!!Form::close()!!}

    
</div>


@include('includes.errors')
    
    
@stop
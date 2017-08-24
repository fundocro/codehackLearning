@extends('layouts.admin')



@section('content')

<h1>Create Category</h1>

<div class="col-sm-9">
    {!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])!!}
        
            <div class="form-group">
                {!!Form::label('name','New Category Name:')!!}
                {!!Form::text('name',null,['class'=>'form-control'])!!}
            </div>
    
            <div class="form-group">
                {!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
            </div>
    
    {!!Form::close()!!}
    
</div>

<table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created_at</th>
          </tr>
        </thead>
        
        @if($category)
            <tbody>
            @foreach($category as $categoryLoop)
              <tr>
                <td>{{$categoryLoop->id}}</td>
                <td>{{$categoryLoop->name}}</td>
                <td>{{$categoryLoop->created_at ? $categoryLoop->created_at->diffForHumans() : 'No Date'}}</td>
              </tr>
            @endforeach
            </tbody>
        @endif
</table>


@stop
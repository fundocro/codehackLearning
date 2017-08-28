@extends('layouts.admin')


@section('content')

<h1>Photo Files/Pictures</h1>

<table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
            <th>Created</th>
       
          </tr>
        </thead>
        @if($photos)
            <tbody>
            @foreach($photos as $photoL)    
              <tr>
                <td>{{$photoL->id}}</td>
                <td>{{$photoL->file}}</td>
                <td><img height="100" src="/images/{{$photoL->file}}" alt=""></td>
                <td>{{$photoL->created_at ? $photoL->created_at : 'Unknow Time/Date'}}</td>
                  
                <td>
                
                    {!!Form::open(['method'=>'DELETE','action'=>['Media@destroy',$photoL->id]])!!}
                        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                    
                </td>
                  
              </tr>
            @endforeach        
            </tbody>
        @endif
</table>


@stop
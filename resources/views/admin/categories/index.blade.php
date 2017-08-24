@extends('layouts.admin')



@section('content')

<h1>Categories.index</h1>


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
                <td><a href="{{route('admin.categories.edit', $categoryLoop->id )}}">{{$categoryLoop->name}}</a></td>
                <td>{{$categoryLoop->created_at ? $categoryLoop->created_at->diffForHumans() : 'No Date'}}</td>
              </tr>
            @endforeach
            </tbody>
        @endif
</table>


@stop
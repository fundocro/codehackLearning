@extends('layouts.admin')

@section('content')


    <h1>Admin.Users.index</h1>
    
<!--THIS IS PREDOWNLOADED TABLE FROM W3schools-->
    <table class="table">
        
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        
        <tbody>
          
              
                @if($users)
              
                    @foreach($users as $x)
                        <tr>
                            <td>{{$x->id}}</td>
                            <td>{{$x->name}}</td>
                            <td>{{$x->email}}</td>
                            <td>{{$x->role->name}}</td>
                            <td>{{$x->is_active==1 ? 'Active' : 'NotActive' }}</td>
                            <td>{{$x->created_at->diffForHumans()}}</td>
                            <td>{{$x->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach

                @endif
              
                   
        </tbody>
    </table>

    
        

    
    
@stop

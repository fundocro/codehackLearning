<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Role;
use App\Http\Requests\UserCheckRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        //IMPORT User at the top!!!
        return view('admin.users.index', compact('users')); 
        //check php artisan route:list
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //import Role on top!
        $roles=Role::lists('name','id')->all();
        //from roles table getting/converting to array name, id 
        //true compact() sending name and id to view/form/role
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCheckRequest $request)//   original Request $request
        //import class on top!!! 
        //use App\Http\Requests\UserCheckRequest;
        //http/request/UserCheckRequest
        //chek authorize admin/user/create froms 
    {
        //return $request->all();//cheking id admin/users/create is returning data
        //returns error page if fileds not populated
        
        User::create($request->all());
        return redirect('/admin/users');
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

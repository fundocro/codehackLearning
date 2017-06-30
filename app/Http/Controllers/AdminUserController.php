<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Role;
use App\Http\Requests\UserCheckRequest;
use App\Http\Requests\UserEditRequest;
use App\Photo;

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
    
        //****************CREATE / STORE
    
    public function store(UserCheckRequest $request)//   original Request $request
        //import class on top!!! 
        //use App\Http\Requests\UserCheckRequest;
        //http/request/UserCheckRequest
        //chek authorize admin/user/create froms 
    {
        //return $request->all();//cheking id admin/users/create is returning data
        //returns error page if fileds not populated
        
        //for creating user:
        //User::create($request->all());
        //return redirect('/admin/users');
//        if($request->file('photo_id')){
//            return "photo exists";
//        }//without ;
        
        
        if(trim($request->password)==''){
            //we use trim to get rid of whitespace
            $input=$request->except('password');
            //if pass not present exclude passign password
        }else{
            
            $input=$request->all();
            //if password exist pass everything !
            $input['password']=bcrypt($request->password);
        }
        
        
        if($file=$request->file('photo_id')){
            //if file (photo)is chosen
            //saving in $file : input from (file FORM) in admin/users/create
            $name=time().$file->getClientOriginalName();
            //getting name from file ,adding time to it and saving in variable $name
            $file->move('images',$name);
            //move $file , create new folder : images and save all there under $name
            //find file in public folder
            $photo=Photo::create(['file'=>$name]);
            //saving record in photos table
            $input['photo_id']=$photo->id;
            //seting user (photo_id) to be = id from photo wich is autogenerated 1,2,3...
        }
        //if we DONT  HAVE photo in create form:
        //we just create user without photo_id and without any record in photos table
        
        
        User::create($input);
        //saves new user in (user table) + belonging photo_id taken from photo table!!!!
        
        return redirect('admin/users/create');
        
        
        
        
        
        
        
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
        $user=User::findOrFail($id);
        
        $roles=Role::lists('name','id')->all();
        //if lists give error use pluck('')
        
        return view('admin.users.edit',compact('user','roles'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //****************EDIT / UPDATE
    
    public function update(UserEditRequest $request, $id)
        //import class on top  use App\Http\Requests\UserEditRequest;
        //UserEditRequest validates all fields in update form except pass field
        //we are updating , so pass already exists
    {
        //return $request->all(); test 
        
        //get id from user that we are updating
      
        $user=User::findOrFail($id);
        //find users id
            
                
        if(trim($request->password)==''){
            $input=$request->except('password');
            //if pass not present exclude passign password
            //pass everything else!
        }else{
            
            $input=$request->all();
            //if password exist pass everything !
            $input['password']=bcrypt($request->password);
        }
        

        if($file=$request->file('photo_id')){//if file is chosen
            
            $name = time().$file->getClientOriginalName();
            
            $file->move('images',$name);
            
            $photo=Photo::create(['file'=>$name]);
            
            $input['photo_id']=$photo->id;
            //saving into Users
            //make users photo is equal to photo id
        }
        
        $user->update($input);
        
        return redirect('admin/users');
        
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

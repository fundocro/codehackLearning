<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use Illuminate\Support\Facades\Auth;

use App\Photo;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::all();
        return view('admin.posts.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostCheckRequest $request)
    {
        //we make new request for validation
        // import on top or manualy here in function
        //storing to DB all fields from admin/post/create form
        
        $input=$request->all();
        //$request-all() from post create form
        // import Auth on top
        $user=Auth::user();
        
        if($file=$request->file('photo_id')){
             
            
                       	                       
            $name = time().$file->getClientOriginalName();
            
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);//file indicated column name in photos table
            
            $input['photo_id']=$photo->id;
        }
        
            $user->post()->create($input);//goes true loged in user!!!!
        
//        Post::create($input); 
//        this wont work because it must go true user to 
//        figure out wich users is making the post
//        otherwise it creates user_id 0 in posts table and fatal error
        
        return redirect('admin/posts');
        //return $request->all();
        
        
        
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
        return view('admin.posts.edit');
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

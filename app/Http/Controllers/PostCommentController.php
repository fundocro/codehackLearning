<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;

use Illuminate\Support\Facades\Auth;


class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        
        //we must submit all required data to comments table!
        //since we do not have forms to fill for : post_id, /author / email /body /photo... we must do it here :
        // check Comment model for fillabels
        
        $user=Auth::user();//to get loged in user, only loged in users will be able to coment
                            // IMPORT AUTH
        
        //comments form : post_id,is_active,author,body,email
        $data=[
            'post_id' => $request->post_id, //obtained from form true hidden <input>
            'author'  => $user->name,
            'email'   => $user->email,
            'photo'   => $user->photo->file,
            // 'photo' added manually to form 
            //to avoid referesh and loosing all tale data we:
            //php artisan make:migration add-photo --table comments
            
            'body'    => $request->body
        ];
        

        
        Comment::create($request->$data); //import on top!
        
                //flashing
        $request->session()->flash('comment_message','Your message has been submitted');
        return redirect()->back();
        

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

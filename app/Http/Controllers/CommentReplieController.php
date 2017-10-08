<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CommentReplie;

use Illuminate\Support\Facades\Auth;

use App\Comment;

class CommentReplieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    
        public function createReplyStore(Request $request)
    {
        //return 'it works';
        $user=Auth::user();
        
    
        $data=[
            'comment_id' => $request->comment_id, //obtained from form true hidden <input>
            'author'  => $user->name, //obtained from logged in user!!!
            'email'   => $user->email,//obtained from logged in user!!!
            'photo'   => $user->photo->file,//obtained from logged in user!!!   
            'body'    => $request->body
        ];
        

        
        CommentReplie::create($data); //comment import on top!
        
        
                //flashing
        $request->session()->flash('comment_reply','Your reply has been submitted');
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
       $comment = Comment::findOrFail($id);
        
        $replies=$comment->replies;
        
        return view('admin.comments.replies.show',compact('replies'));
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

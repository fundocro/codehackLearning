<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;

class Media extends Controller
{
    public function index(){
        
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }
    
    public function create(){
        
        return view('admin.media.create');
        
    }
        
    public function store(Request $request){
        
        //our form true POST, when we upload pictures , returns superglobal named file('') BY DEFAULT
        //$_FILES['file'] that would be in native PHP
        //in laravel :
        
        $UploadFile=$request->file('file');
        $name=time().$UploadFile->getClientOriginalName();
        $UploadFile->move('images',$name);
        
        Photo::create(['file'=>$name]);
        
    }
    
    public function destroy($id){
        
        $photos=Photo::findOrFail($id);
        
        unlink(public_path() . "/images/" . $photos->file);
                
        $photos->delete();
        
        return redirect('admin/media');
        
    }
}
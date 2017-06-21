<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=['file'];
    
    
//    protected $image_path = '/images/';//path to public/images
//    
//    public function getFileAttribute($photo){//using acessor
//        
//        return $this->iamge_path.$photo;
        
//    }
    
    
}

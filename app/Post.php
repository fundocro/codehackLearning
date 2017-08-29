<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body','user_id','category_id','photo_id']; 
    
    
    
    public function user(){
       return $this->belongsTo('App\User'); //reverse one to one (post table contains foreighn key for user)
    }
    
    public function photo(){
        return $this->belongsTo('App\Photo');//reverse one to one (post table contains foreighn key for photo)
    }
    
    public function category(){
        return $this->belongsTo('App\Category');//reverse one to one (post table contains foreighn key for category)
    }
    
    public function comment(){
        return $this->hasMany('App\Comment');// one to many / Post hasMany Cooments
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['post_id','is_active','body','email','author','photo'];
    
    public function replies(){
        return $this->hasMany('App\CommentReplie');//Comment hasMany replies/ onetomany
    }
}

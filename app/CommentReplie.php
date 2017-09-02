<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplie extends Model
{
    protected $fillable=['comment_id','is_active','body','email','author'];
    
    public function comment(){
        return $this->belongsTo('App\Comment');//reverse one to one / replay belongs to only one comment
                                               //CommentReplie belongs to ONE Commenet
    }
}

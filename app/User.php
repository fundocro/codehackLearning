<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id' , 'is_active','photo_id','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function role(){
        //seting relation user-role
        return $this->belongsTo('App\Role');
    }//NO ; HERE!
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    
}

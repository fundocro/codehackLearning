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
        return $this->belongsTo('App\Role');//reverse one to one (user contains f key from role)
                                            //user acess role true f key that he contains in table
    }//NO ; HERE!
    
    public function photo(){
        return $this->belongsTo('App\Photo');//reverse one to one
    }
    
//not neaded anymore!!!   
//    public function setPasswordAttribute($password){
//        if(!empty($password)){
//            $this->attributes['password']=bcrypt($password);
//        }
//    }
    
    
    public function isAdmin(){
        if($this->role->name == 'administrator' && $this->is_active == 1){
            return true;
        }
        return false;
    }
    
    
    public function post(){
        return $this->hasMany('App\Post');//one to many
    }
    
    
    
    
    
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; //config/app.php
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){//if user is loged in
            if(Auth::user()->isAdmin()){//is admin is in User model
                return $next($request);
            }   
        }
        //return redirect('/home');
        return redirect('/'); //return to welcome.blade
        //return $next($request);
    }
}

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
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request);
            }   
        }
        //return redirect('/home');
        return redirect('/');//returns 404 error that we made
        //return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure, Session;
use Illuminate\Http\Request;

class SignMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)// Closure is a class that take care for anonimous functions.
    {
        if( Session::has('user_id')){

            return redirect('');
        }else{
            
        return $next($request);
    }
    }
}

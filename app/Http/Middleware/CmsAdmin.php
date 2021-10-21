<?php

namespace App\Http\Middleware;

use Closure, Session;
use Illuminate\Http\Request;

class CmsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if( ! Session::has('is_admin')){
            return redirect('user/signin');
        } else {
        return $next($request);
        }
    }
}

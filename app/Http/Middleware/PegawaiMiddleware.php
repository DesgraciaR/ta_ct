<?php

namespace App\Http\Middleware;

use Closure;

class PegawaiMiddleware
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
         if((session()->exists('user')||session()->exists('data'))&&(session()->get('user')->level=='2'||session()->get('user')->level=='4')){
            return $next($request);
        }
       
        abort(401,'Unauthorized');
    }
}

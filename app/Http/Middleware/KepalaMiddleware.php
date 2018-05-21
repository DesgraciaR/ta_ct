<?php

namespace App\Http\Middleware;

use Closure;

class KepalaMiddleware
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
        if((session()->exists('user')||session()->exists('data'))&&session()->get('user')->level=='1'){
            return $next($request);
        }
        
        abort(401,'Unauthrorized');
    }
}

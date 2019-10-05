<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;;

use Closure;

class SuperAdminMiddleware
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
        if( $request->user() ){
            // if ( $request->user()->role == 'super_admin' )
            if ( $request->user()->role == 'admin' || $request->user()->role == 'super_admin' )
            {
                return $next($request);
                // return new Response(view('unauthorized')->with('restrict', 'ADMIN'));
            }else{
                // return $next($request);
                return new Response(view('unauthorized')->with('restrict', 'Super Admin'));
            }
        }
    }
}

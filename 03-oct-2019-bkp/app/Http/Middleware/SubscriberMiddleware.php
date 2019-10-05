<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;

use Closure;

class SubscriberMiddleware
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
            if ( $request->user()->role == 'subscriber' )
            {
                return $next($request);
            }else{
                return new Response(view('unauthorized')->with('restrict', 'Subscriber'));
            }
        }
    }
}

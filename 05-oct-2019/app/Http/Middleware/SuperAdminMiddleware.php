<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;;
use App\User;
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
        $userData = User::with('userRoles.role')->first();
        $role = $userData->userRoles->role->name;
        if( $request->user() ){
            if ( $role == 'admin' || $role == 'super_admin' )
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

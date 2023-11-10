<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth()->user()->user_role == 'admin') {
            return $next($request);
        }
        elseif(Auth()->user()->user_role == 'manager'){
            return redirect('/manager-home');
        }else{
            return $next($request);
        }

    }
}

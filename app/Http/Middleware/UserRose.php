<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($role == 'admin') {
            if (Auth::user()->type != 1) {
                 abort(403);
                //return view("layouts.403");
            }
        } 
        return $next($request);
    }
}

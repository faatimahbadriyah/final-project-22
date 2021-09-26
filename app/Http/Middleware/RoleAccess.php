<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RoleAccess
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
        if (Auth::user()['role'] != $role) {
            return redirect('/denied');
        }
        return $next($request);
    }
}
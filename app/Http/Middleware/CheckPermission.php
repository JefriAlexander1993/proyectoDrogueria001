<?php

namespace App\Http\Middleware;

use Closure;
use Role;

class CheckPermission
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
        if (! $request->user()->hasRole($role)) {
           return redirect('/Error/401');
        }

        return $next($request);
    }

}

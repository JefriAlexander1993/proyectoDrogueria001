<?php

namespace App\Http\Middleware;

use Closure;

class MDusuarioAdmin
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

        $rol_actual = \App\Role::find(1);
        if($rol_actual->name !=='admin'){

           return redirect()->action('ErrorController@index')->withInput();
        }
        return $next($request);
    }
}

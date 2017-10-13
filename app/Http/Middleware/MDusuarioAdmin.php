<?php

namespace App\Http\Middleware;

use Closure;
use \App\User;

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
    
    Entrust :: ability ('admin' ,'store');
    }
}

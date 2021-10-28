<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PolikiaMiddleware
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
        $user = Auth::user();
        if ($user->jabatan == 'bidan'  or $user->jabatan == 'CEO'){
            return $next($request);
        }else{
            return abort('401');
        }
    }
}

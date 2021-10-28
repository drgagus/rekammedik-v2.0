<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IgdMiddleware
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
        if ($user->jabatan == 'dokter' or $user->jabatan == 'dokter gigi' or $user->jabatan == 'bidan'  or $user->jabatan == 'CEO'){
            return $next($request);
        }else{
            return abort('401');
        }
    }
}

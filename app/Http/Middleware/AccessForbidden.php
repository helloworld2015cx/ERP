<?php

namespace App\Http\Middleware;

use Closure;

class AccessForbidden
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

        return redirect('forbidden/menu');
//        return $next($request);
    }
}

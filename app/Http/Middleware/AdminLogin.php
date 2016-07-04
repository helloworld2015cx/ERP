<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        $isLogin = session('user_id') ? true : false ;

        if(!$isLogin){
            return redirect('login');
        }else{
            return $next($request);
        }



    }
}

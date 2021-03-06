<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Model\Users\User;


class UserInit
{
    /**
     * Handle an incoming request.
     *   中间件，存储用户的基本信息
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Cache::get('current_user')){
            return $next($request);
        }

        $user_id = session('user_id');


        if($user_id){
            $current_user = User::getUserIdentity($user_id);
            Cache::put('current_user' , $current_user , SYSTEM_CACHE_MINUTES);
        }
        return $next($request);
    }
}

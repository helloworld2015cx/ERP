<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Consts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * 自定义常量在这里定义
         */
        // 定义用户登录后 系统排列相关数据
        defined('SYSTEM_CACHE_MINUTES') ? null : define( 'SYSTEM_CACHE_MINUTES' , 120 );
        // 用户登录后的 $_SESSION['user_id'] 的过期时间
        defined('LOGIN_SESSION_TIME') ? null : define( 'LOGIN_SESSION_TIME' , 120 );

        // 默认页面的 条目的多少
        defined('DEFAULT_PAGE_SIZE') ? null : define('DEFAULT_PAGE_SIZE' , 10);


        return $next($request);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Model\Users\User;

class ShareDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *   向所有的模板共享数据 主要是当前登录用户的相关菜单和基本信息的数据
     * @return void
     */
    public function boot()
    {
//        dump('1234567890');
//        $data =  Cache::get('current_user');
//        if(!$data){
//            $data = User::getUserIdentity(Cache::get('user_id'));
//            Cache::put('current_user' , $data);
//        }
//        view()->share('userData' , $data);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

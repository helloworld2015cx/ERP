<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
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
        //
        $data =  Cache::get('current_user');

//        dump(session('user_id'));

        if(!$data){
//            $data = User::getUserIdentity(session('user_id'));
//            Cache::put('current_user' , $data);
        }
        view()->share('userData' , $data);

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

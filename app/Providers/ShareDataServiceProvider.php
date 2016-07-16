<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

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
        view()->share('userData' , Cache::get('current_user'));
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

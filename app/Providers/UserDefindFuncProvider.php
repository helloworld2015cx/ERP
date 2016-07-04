<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserDefindFuncProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        require_once(app_path('Http/functions.php'));
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

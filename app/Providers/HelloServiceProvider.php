<?php
/**
 * Created by PhpStorm.
 * User: 759517209@qq.com
 * Date: 2017/4/25
 * Time: 16:29
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Hello','App\Contracts\Hello');
        $this->app->bind('App\Contracts\Hello','App\Services\HelloWorld');
    }
}
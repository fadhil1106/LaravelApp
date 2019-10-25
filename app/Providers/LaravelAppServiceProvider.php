<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class LaravelAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $page = '';
        if (Request::segment(1) == 'student') {
            $page = 'student';
        }
        if (Request::segment(1) == 'about') {
            $page = 'about';
        }
        if (Request::segment(1) == 'class') {
            $page = 'class';
        }
        if (Request::segment(1) == 'hobby') {
            $page = 'hobby';
        }
        if (Request::segment(1) == 'user') {
            $page = 'user';
        }
        view()->share('page', $page);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

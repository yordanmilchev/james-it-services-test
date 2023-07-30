<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Pass variable to certain blades.
     */
    public function boot(): void
    {
        View::composer(['components.left_navigation', 'components.header'], function ($view) {
            $view->with('routeName', \Route::currentRouteName());
        });
    }
}

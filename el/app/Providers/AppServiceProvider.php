<?php

namespace App\Providers;



use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        if (env(key: 'APP_ENV') !=='local') {
            URL::forceScheme(scheme:'https');
        }
//        $this->app->bind('path.public', function () {
//            return realpath(base_path() . '/');
//        });
//        app()->usePublicPath(base_path(), '../');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

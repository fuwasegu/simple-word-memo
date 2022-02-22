<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Two\GoogleProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(Guard::class, StatefulGuard::class);

        // 本アプリケーションでは，ログインに Google OAuth2 のみを利用するため，AuthManager を決め打ちする
        $this->app
            ->when(GoogleProvider::class)
            ->needs('$clientId')
            ->give(config('services.google.client_id'));
        $this->app
            ->when(GoogleProvider::class)
            ->needs('$clientSecret')
            ->give(config('services.google.client_secret'));
        $this->app
            ->when(GoogleProvider::class)
            ->needs('$redirectUrl')
            ->give(config('services.google.redirect'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

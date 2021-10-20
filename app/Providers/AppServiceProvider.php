<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
            \Log::debug($query->sql);
            \Log::debug($query->bindings);
            \Log::debug($query->time);
        });
    }
}

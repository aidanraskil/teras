<?php

namespace Iskandarali\Teras;

use Illuminate\Support\ServiceProvider;

class TerasServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/../database/seeds/TerasTableSeeder.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'teras');
    }
}

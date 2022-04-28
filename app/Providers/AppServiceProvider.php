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
        $this->app->singleton(\App\Repository\Interfaces\CarRepositoryInterface::class,
         \App\Repository\CarRepository::class);
         $this->app->singleton(\App\Repository\Interfaces\OwnerRepositoryInterface::class,
         \App\Repository\OwnerRepository::class);
         $this->app->singleton(\App\Repository\Interfaces\TransactionInterface::class,
         \App\Repository\TransactionRepository::class);
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

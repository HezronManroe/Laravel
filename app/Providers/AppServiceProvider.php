<?php

namespace App\Providers;
use App\Http\Service\BarangRepository;
use App\Http\Service\BarangInterface;
use App\Http\Service\DiskonRepository;
use App\Http\Service\DiskonInterface;
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
        $this->app->bind(BarangInterface::class, BarangRepository::class);
        $this->app->bind(DiskonInterface::class, DiskonRepository::class);
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

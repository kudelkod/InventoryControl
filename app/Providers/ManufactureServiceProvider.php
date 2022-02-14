<?php

namespace App\Providers;

use App\Contracts\ManufactureServiceInterface;
use App\Services\ManufactureService;
use Illuminate\Support\ServiceProvider;

class ManufactureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ManufactureServiceInterface::class, function (){
            return new ManufactureService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Contracts\StatusServiceInterface;
use App\Services\StatusService;
use Illuminate\Support\ServiceProvider;

class StatusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StatusServiceInterface::class, function (){
            return new StatusService();
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

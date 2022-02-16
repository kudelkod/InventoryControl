<?php

namespace App\Providers;

use App\Contracts\ParameterServiceInterface;
use App\Services\ParameterService;
use Illuminate\Support\ServiceProvider;

class ParameterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ParameterServiceInterface::class, function (){
            return new ParameterService();
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

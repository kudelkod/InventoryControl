<?php

namespace App\Providers;

use App\Contracts\ModelServiceInterface;
use App\Services\ModelService;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ModelServiceInterface::class, function (){
            return new ModelService();
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

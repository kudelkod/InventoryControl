<?php

namespace App\Modules\Manufacture\src;

use App\Modules\Manufacture\src\Repositories\Contracts\ManufactureRepositoryInterface;
use App\Modules\Manufacture\src\Repositories\ManufactureRepository;
use App\Modules\Manufacture\src\Services\Contracts\ManufactureServiceInterface;
use App\Modules\Manufacture\src\Services\ManufactureService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ManufactureServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ManufactureServiceInterface::class => ManufactureService::class,
        ManufactureRepositoryInterface::class => ManufactureRepository::class
        ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();

        Route::middleware('web')
            ->name('manufacturers.')
            ->prefix('manufacturers')
            ->group(__DIR__ . '/../routes/routes.php');
    }

    public function registerViews(){

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views', 'manufacturers'
        );
    }
}

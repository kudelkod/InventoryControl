<?php

namespace App\Modules\Inventory\src;

use App\Modules\Inventory\src\Repositories\Contracts\InventoryRepositoryInterface;
use App\Modules\Inventory\src\Repositories\InventoryRepository;
use App\Modules\Inventory\src\Services\Contracts\InventoryServiceInterface;
use App\Modules\Inventory\src\Services\InventoryService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        InventoryServiceInterface::class => InventoryService::class,
        InventoryRepositoryInterface::class => InventoryRepository::class
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
            ->name('inventory.')
            ->prefix('inventory')
            ->group(__DIR__ . '/../routes/routes.php');
    }

    public function registerViews(){

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views', 'inventory'
        );
    }
}

<?php

namespace App\Modules\Model\src;

use App\Modules\Model\src\Repositories\ModelRepository;
use App\Modules\Model\src\Repositories\Contracts\ModelRepositoryInterface;
use App\Modules\Model\src\Services\Contracts\ModelServiceInterface;
use App\Modules\Model\src\Services\ModelService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ModelServiceInterface::class => ModelService::class,
        ModelRepositoryInterface::class => ModelRepository::class
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
            ->name('models.')
            ->prefix('models')
            ->group(__DIR__ . '/../routes/routes.php');
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews(): void
    {

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views', 'models'
        );
    }
}

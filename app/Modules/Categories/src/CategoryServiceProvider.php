<?php

namespace App\Modules\Categories\src;

use App\Modules\Categories\src\Repositories\CategoryRepository;
use App\Modules\Categories\src\Repositories\Contracts\CategoryRepositoryInterface;
use App\Modules\Categories\src\Services\CategoryService;
use App\Modules\Categories\src\Services\Contracts\CategoryServiceInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public array $bindings = [
        CategoryServiceInterface::class => CategoryService::class,
        CategoryRepositoryInterface::class => CategoryRepository::class
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
            ->name('categories.')
            ->prefix('categories')
            ->group(__DIR__ . '/../routes/routes.php');
    }


    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews(){

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views', 'categories'
        );
    }
}

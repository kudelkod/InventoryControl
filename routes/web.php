<?php

use App\Http\Controllers\Admin\StatusController;
use App\Modules\Model\src\Controllers\ModelController;
use App\Modules\Model\src\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Auth::routes();

Route::prefix('admin')->group(function (){
//    Route::prefix('categories')->group(function (){
//        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
//        Route::get('create/', [CategoryController::class, 'create'])->name('categories.create');
//        Route::post('create/', [CategoryController::class, 'store'])->name('categories.store');
//        Route::get('edit/{slug}', [CategoryController::class, 'edit'])->name('categories.edit');
//        Route::post('edit/{slug}', [CategoryController::class, 'update'])->name('categories.update');
//        Route::delete('delete/{slug}', [CategoryController::class, 'delete'])->name('categories.delete');
//
//        Route::resource('categories_test',CategoryTestController::class);
//    });

    Route::prefix('statuses')->group(function (){
        Route::get('create/', [StatusController::class, 'create'])->name('statuses.create');
        Route::post('create/', [StatusController::class, 'store'])->name('statuses.store');
        Route::get('edit/',[StatusController::class, 'edit'])->name('statuses.edit');
        Route::post('edit/',[StatusController::class, 'update'])->name('statuses.update');

        Route::post('getAboutStatus',[StatusController::class, 'getAjaxStatus'])->name('statuses.getAboutStatus');
    });

//    Route::prefix('manufacturers')->group(function (){
//        Route::get('/', [ManufactureController::class, 'index'])->name('manufacturers.index');
//        Route::get('/create', [ManufactureController::class, 'create'])->name('manufacturers.create');
//        Route::post('/create', [ManufactureController::class, 'store'])->name('manufacturers.store');
//        Route::get('edit/{slug}', [ManufactureController::class, 'edit'])->name('manufacturers.edit');
//        Route::post('edit/{slug}', [ManufactureController::class, 'update'])->name('manufacturers.update');
//        Route::delete('delete/{slug}', [ManufactureController::class, 'delete'])->name('manufacturers.delete');
//    });

    Route::prefix('models')->group(function (){
        Route::get('/', [ModelController::class, 'index'])->name('models.index');
        Route::get('create/', [ModelController::class, 'create'])->name('models.create');
        Route::post('create/', [ModelController::class, 'store'])->name('models.store');

        Route::post('getAjaxTypeId', [ModelController::class, 'getAjaxTypeId'])->name('models.getAjaxTypeId');
    });

    Route::prefix('parameters')->group(function (){
        Route::post('/create', [ParameterController::class, 'create'])->name('parameters.create');
        Route::get('getTypes', [ParameterController::class, 'getTypes'])->name('parameters.getTypes');
    });
});


//Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

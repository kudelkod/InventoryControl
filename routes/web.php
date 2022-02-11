<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CategoryTestController;
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
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function (){
    Route::prefix('categories')->group(function (){
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('create/', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('create/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{slug}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('edit/{slug}', [CategoryController::class, 'update'])->name('categories.update');
        Route::post('delete/{slug}', [CategoryController::class, 'delete'])->name('categories.delete');

        Route::resource('categories_test',CategoryTestController::class);
    });

});

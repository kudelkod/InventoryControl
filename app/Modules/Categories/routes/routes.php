<?php

use App\Modules\Categories\src\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'index'])->name('index');
Route::get('/getCategories', [CategoryController::class, 'getCategories']);
Route::post('/addCategory', [CategoryController::class, 'addCategory']);
Route::delete('/{id}/deleteCategory', [CategoryController::class, 'deleteCategory']);
Route::post('{id}/editCategory', [CategoryController::class, 'editCategory']);


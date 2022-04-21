<?php

use App\Modules\Categories\src\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'index']);
Route::get('/getCategories', [CategoryController::class, 'getCategories']);

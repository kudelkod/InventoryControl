<?php

use App\Modules\Manufacture\src\Controllers\ManufactureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ManufactureController::class, 'index']);
Route::get('/getManufacturers', [ManufactureController::class, 'getManufacturers']);
Route::post('/addManufacturers', [ManufactureController::class, 'addManufacturers']);
//Route::delete('/{id}/deleteCategory', [CategoryController::class, 'deleteCategory']);
//Route::post('{id}/editCategory', [CategoryController::class, 'editCategory']);

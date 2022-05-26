<?php

use App\Modules\Manufacture\src\Controllers\ManufactureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ManufactureController::class, 'index']);
Route::get('/getManufacturers', [ManufactureController::class, 'getManufacturers']);
Route::post('/addManufacturers', [ManufactureController::class, 'addManufacturers']);
Route::delete('/{id}/deleteManufacture', [ManufactureController::class, 'deleteManufacture']);
Route::post('{id}/editManufacture', [ManufactureController::class, 'editManufacture']);

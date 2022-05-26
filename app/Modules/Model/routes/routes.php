<?php

use App\Modules\Model\src\Controllers\ModelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ModelController::class, 'index']);
Route::get('/getModels', [ModelController::class, 'getModels']);
//Route::post('/addManufacturers', [ManufactureController::class, 'addManufacturers']);
//Route::delete('/{id}/deleteManufacture', [ManufactureController::class, 'deleteManufacture']);
//Route::post('{id}/editManufacture', [ManufactureController::class, 'editManufacture']);

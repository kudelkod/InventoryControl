<?php

use App\Modules\Model\src\Controllers\ModelController;
use App\Modules\Model\src\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ModelController::class, 'index']);
Route::get('/getModels', [ModelController::class, 'getModels']);
Route::get('/getTypes', [ParameterController::class, 'getTypes']);
Route::post('/addModel', [ModelController::class, 'addModel']);
//Route::delete('/{id}/deleteManufacture', [ManufactureController::class, 'deleteManufacture']);
//Route::post('{id}/editManufacture', [ManufactureController::class, 'editManufacture']);

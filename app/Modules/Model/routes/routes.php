<?php

use App\Modules\Model\src\Controllers\ModelController;
use App\Modules\Model\src\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ModelController::class, 'index']);
Route::get('/getModels', [ModelController::class, 'getModels']);
Route::get('{id}/getModelParameters', [ModelController::class, 'getModelParameters']);
Route::get('/getTypes', [ParameterController::class, 'getTypes']);
Route::post('/addModel', [ModelController::class, 'addModel']);
Route::delete('/{id}/deleteModel', [ModelController::class, 'deleteModel']);
Route::post('{id}/editModel', [ModelController::class, 'editModel']);

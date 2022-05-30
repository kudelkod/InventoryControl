<?php

use App\Modules\Inventory\src\Controllers\InventoryController;
use App\Modules\Manufacture\src\Controllers\ManufactureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InventoryController::class, 'index']);
Route::get('/getInventory', [InventoryController::class, 'getInventory']);
//Route::post('/addManufacturers', [ManufactureController::class, 'addManufacturers']);
//Route::delete('/{id}/deleteManufacture', [ManufactureController::class, 'deleteManufacture']);
//Route::post('{id}/editManufacture', [ManufactureController::class, 'editManufacture']);


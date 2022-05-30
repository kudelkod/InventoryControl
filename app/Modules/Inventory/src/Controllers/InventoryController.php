<?php

namespace App\Modules\Inventory\src\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Inventory\src\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        return view('inventory::index');
    }

    public function getInventory(){
        return Inventory::get()->toArray();
    }
}

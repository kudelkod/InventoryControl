<?php

namespace App\Modules\Manufacture\src\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Manufacture\src\Services\Contracts\ManufactureServiceInterface;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    private ManufactureServiceInterface $manufactureService;

    public function __construct(ManufactureServiceInterface $service){
        $this->manufactureService = $service;
    }

    public function index()
    {
        return view('manufacturers::index');
    }

    public function getManufacturers()
    {
        return $this->manufactureService->getManufacturers();
    }

    public function addManufacturers(Request $request){
        $data = $request->input();

        return $this->manufactureService->addManufacture($data);
    }
}

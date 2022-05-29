<?php

namespace App\Modules\Model\src\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Model\src\Services\Contracts\ParameterServiceInterface;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    private ParameterServiceInterface $parameterService;
    public function __construct(ParameterServiceInterface $service)
    {
        $this->parameterService = $service;
    }

    public function getTypes(){
        return $this->parameterService->getTypes();
    }

    public function create(Request $request){
        dd($request);
    }
}

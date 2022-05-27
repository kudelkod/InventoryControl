<?php

namespace App\Modules\Model\src\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Model\src\Services\Contracts\ParameterServiceInterface;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function getTypes(ParameterServiceInterface $service){
        return $service->getTypes();
    }

    public function create(Request $request){
        dd($request);
    }
}

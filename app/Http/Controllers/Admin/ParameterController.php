<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ParameterServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function getType(ParameterServiceInterface $service){
        return $service->getType();
    }

    public function create(Request $request){
        dd($request);
    }
}

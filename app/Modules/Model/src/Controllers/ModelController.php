<?php

namespace App\Modules\Model\src\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Manufacture\src\Services\Contracts\ManufactureServiceInterface;
use App\Modules\Model\src\Services\Contracts\ModelServiceInterface;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    private ModelServiceInterface $modelsService;

    public function __construct(ModelServiceInterface $service){
        $this->modelsService = $service;
    }
    public function index(){

        return view('models::index');
    }

    public function getModels(){

        return $this->modelsService->getAllModels();
    }
//    public function create(ModelServiceInterface $service){
//
//        $parameters = $service->getParameters();
//
//        return view('admin.models.create', compact('parameters'));
//    }
//
//    public function store(Request $request){
//        dd($request);
//        $result = array_combine($request->parameter_name, $request->parameter_value);
//        dd($result);
//    }
//
//    public function getAjaxTypeId(Request $request, ModelServiceInterface $service){
//
//        $parameter = $service->getAjaxTypeId($request->id);
//
//        return $parameter->type_id;
//    }

}

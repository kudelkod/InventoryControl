<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ModelServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index(ModelServiceInterface $service){

        $models = $service->getAllWithPaginate(5);

        return view('admin.models.index', compact('models'));
    }

    public function create(ModelServiceInterface $service){

        $parameters = $service->getParameters();

        return view('admin.models.create', compact('parameters'));
    }

    public function store(Request $request){
        dd($request);
        $result = array_combine($request->parameter_name, $request->parameter_value);
        dd($result);
    }

    public function getAjaxTypeId(Request $request, ModelServiceInterface $service){

        $parameter = $service->getAjaxTypeId($request->id);

        return $parameter->type_id;
    }

}

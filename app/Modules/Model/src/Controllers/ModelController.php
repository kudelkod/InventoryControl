<?php

namespace App\Modules\Model\src\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Manufacture\src\Services\Contracts\ManufactureServiceInterface;
use App\Modules\Model\src\Models\Model;
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

    public function addModel(Request $request){
        $data = $request->input();
        return $this->modelsService->addModel($data);
    }

    public function editModel(Request $request, $id){
        $data = $request->input();

        return $this->modelsService->editModel($data, $id);
    }

    public function deleteModel($id){
        return $this->modelsService->deleteModel($id);
    }

    public function getModelParameters($id){
        return $this->modelsService->getModelParameters($id);
    }

    public function getManufacturersModels($manufacture_id){
        return Model::select('*')->where('manufacture_id', $manufacture_id)->get()->toArray();
    }
}

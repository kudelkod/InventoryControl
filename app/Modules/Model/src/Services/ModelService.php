<?php

namespace App\Modules\Model\src\Services;

use App\Modules\Model\src\Repositories\Contracts\ModelRepositoryInterface;
use App\Modules\Model\src\Repositories\Contracts\ParameterRepositoryInterface;
use App\Modules\Model\src\Repositories\ParameterRepository;
use App\Modules\Model\src\Services\Contracts\ModelServiceInterface;

class ModelService implements ModelServiceInterface
{
    protected mixed $modelRepository;
    protected mixed $parameterRepository;

    public function __construct(
        ModelRepositoryInterface $modelRepository,
        ParameterRepositoryInterface $parameterRepository){

        $this->modelRepository = $modelRepository;
        $this->parameterRepository = $parameterRepository;
    }

    public function getAllModels()
    {
        return $this->modelRepository->getAllModels();
    }

    public function addModel($data)
    {
        $parameters = $data['parameters'];

        $modelId = $this->modelRepository->addModel($data);

        $parameters = $this->addModelId($parameters, $modelId);

        if ($this->parameterRepository->addParameters($parameters))
            return true;
        return false;
    }

    public function deleteModel($id)
    {
        $this->parameterRepository->deleteModelParameters($id);
        return $this->modelRepository->deleteModel($id);
    }

    public function getModelParameters($id)
    {
        return $this->parameterRepository->getModelParameters($id);
    }

    public function editModel($data, $id)
    {
        $parameters = $data['parameters'];

        $this->modelRepository->editModel($data, $id);

        $parameters = $this->addModelId($parameters, $id);

        if ($this->parameterRepository->editModelParameters($parameters, $id))
            return true;
        return false;
    }

    private function addModelId($parameters, $modelId){
        $newParameters = [];

        foreach ($parameters as $parameter){
            $parameter['model_id'] = $modelId;
            $newParameters[] = $parameter;
            unset($parameter);
        }

        return $newParameters;
    }
}

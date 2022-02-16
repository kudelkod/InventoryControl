<?php

namespace App\Services;

use App\Contracts\ModelServiceInterface;
use App\Repositories\ModelRepository;
use App\Repositories\ParameterRepository;

class ModelService implements ModelServiceInterface
{
    protected mixed $modelRepository;
    protected mixed $parameterRepository;

    public function __construct(){

        $this->modelRepository = app(ModelRepository::class);
        $this->parameterRepository = app(ParameterRepository::class);
    }

    public function getAllWithPaginate($perPage)
    {
        // TODO: Implement getAllWithPaginate() method.

        return $this->modelRepository->getAllModels()->paginate($perPage);

    }

    public function getParameters()
    {
        // TODO: Implement getAllTypes() method.

        return $this->parameterRepository->getAllParameters()->get();
    }

    public function getAjaxTypeId($id)
    {
        // TODO: Implement getAjaxTypeId() method.

        return $this->parameterRepository->getParameter($id)->first();
    }
}

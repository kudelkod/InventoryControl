<?php

namespace App\Modules\Model\src\Services;

use App\Modules\Model\src\Repositories\Contracts\ModelRepositoryInterface;
use App\Modules\Model\src\Repositories\ParameterRepository;
use App\Modules\Model\src\Services\Contracts\ModelServiceInterface;

class ModelService implements ModelServiceInterface
{
    protected mixed $modelRepository;
    protected mixed $parameterRepository;

    public function __construct(ModelRepositoryInterface $modelRepository){

        $this->modelRepository = $modelRepository;
        $this->parameterRepository = app(ParameterRepository::class);
    }

    public function getAllModels()
    {
        // TODO: Implement getAllWithPaginate() method.

        return $this->modelRepository->getAllModels();

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

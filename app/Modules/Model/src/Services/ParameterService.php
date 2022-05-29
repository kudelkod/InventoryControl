<?php

namespace App\Modules\Model\src\Services;

use App\Modules\Model\src\Repositories\Contracts\ParameterRepositoryInterface;
use App\Modules\Model\src\Repositories\ParameterRepository;
use App\Modules\Model\src\Services\Contracts\ParameterServiceInterface;

class ParameterService implements ParameterServiceInterface
{
    private mixed $parameterRepository;

    public function __construct(ParameterRepositoryInterface $repository){
        $this->parameterRepository = $repository;
    }

    public function getTypes()
    {
        return $this->parameterRepository->getParametersTypes();
    }
}

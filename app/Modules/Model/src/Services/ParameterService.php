<?php

namespace App\Modules\Model\src\Services;

use App\Modules\Model\src\Repositories\ParameterRepository;
use App\Modules\Model\src\Services\Contracts\ParameterServiceInterface;

class ParameterService implements ParameterServiceInterface
{
    private mixed $parameterRepository;

    public function __construct(){
        $this->parameterRepository = app(ParameterRepository::class);
    }

    public function getTypes()
    {
        // TODO: Implement getType() method.
        $params = $this->parameterRepository->getParametersTypes()->toArray();
        return $params;
    }
}

<?php

namespace App\Services;

use App\Contracts\ParameterServiceInterface;
use App\Repositories\ParameterRepository;

class ParameterService implements ParameterServiceInterface
{
    private mixed $parameterRepository;

    public function __construct(){
        $this->parameterRepository = app(ParameterRepository::class);
    }

    public function getType()
    {
        // TODO: Implement getType() method.
        return $this->parameterRepository->getParametersType()->get();
    }
}

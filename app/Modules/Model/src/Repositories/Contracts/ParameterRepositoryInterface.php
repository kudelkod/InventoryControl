<?php

namespace App\Modules\Model\src\Repositories\Contracts;

interface ParameterRepositoryInterface
{
    public function getParametersTypes();

    public function addParameters($data);
}

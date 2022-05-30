<?php

namespace App\Modules\Model\src\Repositories\Contracts;

interface ParameterRepositoryInterface
{
    public function getParametersTypes();

    public function addParameters($data);

    public function deleteModelParameters($modelId);

    public function getModelParameters($modelId);

    public function editModelParameters($parameters, $modelId);
}

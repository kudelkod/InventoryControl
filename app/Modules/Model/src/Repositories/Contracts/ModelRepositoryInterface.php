<?php

namespace App\Modules\Model\src\Repositories\Contracts;

interface ModelRepositoryInterface
{
    public function getAllModels();

    public function addModel($data);
}

<?php

namespace App\Modules\Model\src\Services\Contracts;

interface ModelServiceInterface{
    public function getAllModels();

    public function addModel($data);
}

<?php

namespace App\Modules\Model\src\Services\Contracts;

interface ModelServiceInterface{
    public function getAllModels();

    public function addModel($data);

    public function deleteModel($id);

    public function getModelParameters($id);

    public function editModel($data, $id);
}

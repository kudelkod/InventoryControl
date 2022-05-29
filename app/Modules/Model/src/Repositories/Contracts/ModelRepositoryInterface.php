<?php

namespace App\Modules\Model\src\Repositories\Contracts;

interface ModelRepositoryInterface
{
    public function getAllModels();

    public function addModel($data);

    public function deleteModel($id);

    public function editModel($data, $id);
}

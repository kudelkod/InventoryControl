<?php

namespace App\Modules\Manufacture\src\Repositories\Contracts;

interface ManufactureRepositoryInterface
{
    public function getManufacturers();

    public function createManufacture($data);

    public function updateManufacture($data, $id);

    public function deleteManufacture($id);

}

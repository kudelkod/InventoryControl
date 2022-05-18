<?php

namespace App\Modules\Manufacture\src\Services\Contracts;

interface ManufactureServiceInterface
{
    public function getManufacturers();

    public function addManufacture($data);

    public function deleteManufacture($id);

    public function updateManufacture($data, $id);
}

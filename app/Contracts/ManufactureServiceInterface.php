<?php

namespace App\Contracts;

interface ManufactureServiceInterface
{
    public function getManufacturersWithPaginate($perPage);

    public function createManufacture($data);

    public function deleteManufacture($slug);

    public function getManufacture($slug);

    public function updateManufacture($data, $slug);
}

<?php

namespace App\Modules\Manufacture\src\Services;

use App\Modules\Manufacture\src\Models\Manufacture;
use App\Modules\Manufacture\src\Repositories\Contracts\ManufactureRepositoryInterface;
use App\Modules\Manufacture\src\Repositories\ManufactureRepository;
use App\Modules\Manufacture\src\Services\Contracts\ManufactureServiceInterface;

class ManufactureService implements ManufactureServiceInterface
{

    private ManufactureRepositoryInterface $manufactureRepository;

    public function __construct(ManufactureRepositoryInterface $repository){
        $this->manufactureRepository = $repository;
    }

    public function getManufacturers()
    {
        // TODO: Implement getManufacturersWithPaginate() method.
    }

    public function createManufacture($data)
    {
        // TODO: Implement createManufacture() method.
    }

    public function deleteManufacture($id)
    {
        // TODO: Implement deleteManufacture() method.
    }

    public function updateManufacture($data, $slug)
    {
        // TODO: Implement updateManufacture() method.
    }
}

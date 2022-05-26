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
        return $this->manufactureRepository->getManufacturers()->toArray();
    }

    public function addManufacture($data)
    {
        return $this->manufactureRepository->createManufacture($data);
    }

    public function deleteManufacture($id)
    {
        return $this->manufactureRepository->deleteManufacture($id);
    }

    public function updateManufacture($data, $id)
    {
        return $this->manufactureRepository->updateManufacture($data, $id);
    }
}

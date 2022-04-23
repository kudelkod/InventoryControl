<?php

namespace App\Modules\Manufacture\src\Repositories;

use App\Modules\Manufacture\src\Models\Manufacture;
use App\Modules\Manufacture\src\Repositories\Contracts\ManufactureRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ManufactureRepository.
 */
class ManufactureRepository extends BaseRepository implements ManufactureRepositoryInterface
{

    public function __construct()
    {
        parent::__construct();
    }

    public function model()
    {
        return Manufacture::class;
    }

    public function getManufacturers()
    {
        // TODO: Implement getManufacturers() method.
    }

    public function createManufacture($data)
    {
        // TODO: Implement createManufacture() method.
    }

    public function updateManufacture($data, $id)
    {
        // TODO: Implement updateManufacture() method.
    }

    public function deleteManufacture($id)
    {
        // TODO: Implement deleteManufacture() method.
    }
}

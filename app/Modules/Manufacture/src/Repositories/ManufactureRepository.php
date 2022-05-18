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
        $columns = ['id', 'name', 'description', 'address'];
        return $this->model->select($columns)->get();
    }

    public function createManufacture($data)
    {
        if ($this->model->create($data))
            return true;
        return false;
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

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

    public function model(): string
    {
        return Manufacture::class;
    }

    public function getManufacturers()
    {
        return $this->model->select('*')->get();
    }

    public function createManufacture($data): bool
    {
        if ($this->model->create($data))
            return true;
        return false;
    }

    public function updateManufacture($data, $id): bool
    {
        $manufacture = $this->model->find($id);

        if ($manufacture->update($data))
            return true;
        return false;
    }

    public function deleteManufacture($id): bool
    {
        if ($this->model->destroy($id))
            return true;
        return false;
    }
}

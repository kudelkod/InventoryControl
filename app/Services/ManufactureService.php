<?php

namespace App\Services;

use App\Contracts\ManufactureServiceInterface;
use App\Models\Manufacture;
use App\Repositories\ManufactureRepository;

class ManufactureService implements ManufactureServiceInterface
{

    private mixed $manufactureRepository;

    public function __construct(){
        $this->manufactureRepository = app(ManufactureRepository::class);
    }

    public function getManufacturersWithPaginate($perPage)
    {
        // TODO: Implement getManufacturersWithPaginate() method.

        $manufacturers = $this->manufactureRepository->getAllManufacturers();

        return $manufacturers->paginate($perPage);
    }

    public function createManufacture($data)
    {
        // TODO: Implement createManufacture() method.

        $result = (new Manufacture())->create($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteManufacture($slug)
    {
        // TODO: Implement deleteManufacture() method.
        $manufacture = $this->getManufacture($slug);

        if($manufacture->destroy($manufacture->id)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getManufacture($slug)
    {
        // TODO: Implement getManufacture() method.

        return $this->manufactureRepository->getManufacture($slug);
    }

    public function updateManufacture($data, $slug)
    {
        // TODO: Implement updateManufacture() method.

        $manufacture = $this->getManufacture($slug);

        if($manufacture->update($data)){
            return true;
        }
        else {
            return false;
        }
    }
}

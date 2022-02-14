<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Manufacture;

/**
 * Class ManufactureRepository.
 */
class ManufactureRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Manufacture::class;
    }

    public function getAllManufacturers()
    {
        $columns = [
            'id',
            'name',
            'slug',
            'address'
        ];

        return $this->model->select($columns);
    }

    public function getManufacture($slug){
        $columns = [
            'id',
            'name',
            'slug',
            'address'
        ];

        return $this->model->select($columns)->where('slug', $slug)->first();
    }
}

<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Model;

/**
 * Class ModelRepository.
 */
class ModelRepository extends BaseRepository
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
        return Model::class;
    }

    public function getAllModels(){

        $columns=[
            'id',
            'name',
            'year',
            'manufacture_id'
        ];

        return $this->model->select($columns);
    }
}

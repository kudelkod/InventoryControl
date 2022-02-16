<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Parameter;

/**
 * Class ParameterRepository.
 */
class ParameterRepository extends BaseRepository
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
        return Parameter::class;
    }

    public function getAllParameters(){

        $columns = [
            'id',
            'name',
            'type_id',
            'value',
        ];

        return $this->model->select($columns);
    }

    public function getParameter($id){

        $columns = [
            'id',
            'name',
            'type_id',
            'value',
        ];

        return $this->model->select($columns)->where('id', $id);
    }
}

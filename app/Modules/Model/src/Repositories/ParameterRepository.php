<?php

namespace App\Modules\Model\src\Repositories;

use App\Models\Parameter;
use App\Models\Type;
use App\Modules\Model\src\Repositories\Contracts\ParameterRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ParameterRepository.
 */
class ParameterRepository extends BaseRepository implements ParameterRepositoryInterface
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

    public function getParametersTypes(){
        return Type::get();
    }
}

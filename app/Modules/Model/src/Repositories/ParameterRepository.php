<?php

namespace App\Modules\Model\src\Repositories;

use App\Modules\Model\src\Models\Parameter;
use App\Modules\Model\src\Models\Type;
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
        return Type::get()->toArray();
    }

    public function addParameters($data)
    {
        foreach ($data as $value){
            try {
                $this->model->create($value);
            }catch (\Exception $e){
                return false;
            }
        }
        return true;
    }

    public function deleteModelParameters($modelId)
    {
        return $this->model->where('model_id', $modelId)->delete();
    }

    public function getModelParameters($modelId)
    {
        return $this->model->where('model_id', $modelId)
            ->get()
            ->toarray();
    }

    public function editModelParameters($parameters, $modelId)
    {
        $this->deleteModelParameters($modelId);

        foreach ($parameters as $parameter){
            try{
                unset($parameter['id']);
                $this->model->create($parameter);
            }
            catch (\Exception $e){
                return false;
            }
        }
        return true;
    }
}

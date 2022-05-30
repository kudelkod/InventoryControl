<?php

namespace App\Modules\Model\src\Repositories;

use App\Modules\Model\src\Models\Model;
use App\Modules\Model\src\Repositories\Contracts\ModelRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ModelRepository.
 */
class ModelRepository extends BaseRepository implements ModelRepositoryInterface
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

        return$this->model->select('*')
            ->get()
            ->toArray();
    }

    public function addModel($data)
    {
        $newModelId = $this->model->create($data)->id;
        if ($newModelId)
            return $newModelId;
        return false;
    }

    public function editModel($data, $id)
    {
        $model = $this->model->find($id);

        return $model->update($data);
    }

    public function deleteModel($id)
    {
        if ($this->model->destroy($id))
            return true;
        return false;
    }
}

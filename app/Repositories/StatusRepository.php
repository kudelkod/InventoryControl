<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Status;

/**
 * Class StatusRepository.
 */
class StatusRepository extends BaseRepository
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
        return Status::class;
    }

    public function getStatusesForCombobox()
    {
        $columns = implode(',',
                ['id',
                'CONCAT (id,". ", name) AS id_name',
                ]);

        return $this->model->selectRaw($columns)
            ->toBase()
            ->get();
    }

    public function getStatusById($id){
        $columns = [
            'id',
            'name',
            'about',
        ];
        return $this->model->select($columns)->where('id', $id)->first();
    }

    public function getAjaxStatus($id){
        $columns = [
            'id',
            'name',
            'about',
        ];
        return $this->model->select($columns)->where('id', $id)->get();
    }
}

<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Category;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return Category::class;
    }

    /**
     * @param $perPage
     * @return mixed
     */
    public function getCategoriesWithPaginate($perPage): mixed
    {
        $columns = ['id', 'parent_category_id', 'name'];

        return $this->model->select($columns)
                           ->paginate($perPage);
    }
}

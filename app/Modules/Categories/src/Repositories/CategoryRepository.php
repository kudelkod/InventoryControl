<?php

namespace App\Modules\Categories\src\Repositories;

use App\Modules\Categories\src\Models\Category;
use App\Modules\Categories\src\Repositories\Contracts\CategoryRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
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
     * @return mixed
     */
    public function getAllCategories(): mixed
    {
        $columns = ['id', 'parent_category_id', 'name', 'description'];
        return $this->model->select($columns)
                           ->with(['parentCategory:id,name']);
    }

    public function createCategory($data){
        if($this->model->create($data))
            return true;
        return false;
    }

    public function updateCategory($data, $id){
        $item = $this->model->find($id);

        if ($item->update($data))
            return true;
        return false;
    }

    public function deleteCategory($id){

        if ($this->model->destroy($id))
            return true;
        return false;
    }
}

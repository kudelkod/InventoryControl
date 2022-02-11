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
     * @return mixed
     */
    public function getAllCategories(): mixed
    {
        $columns = ['id', 'parent_category_id', 'name', 'slug'];
        return $this->model->select($columns);
    }

    public function getCategoriesForCombobox()
    {
        $columns = implode(',',['id',
            'CONCAT (id,". ", name) AS id_name'
        ]);

        return $this->model->selectRaw($columns)
                           ->toBase()
                           ->get();
    }

    public function getCategoryBySlug($slug){

        $columns = ['id', 'parent_category_id', 'name', 'slug'];

        return $this->model->select($columns)->where('slug', $slug)->first();
    }

//    public function deleteCategory($id){
//        $columns = ['id', 'parent_category_id', 'name', 'slug'];
//
//        return $this->model->destroy($id);
//    }
}

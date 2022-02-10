<?php

namespace App\Services;

use App\Contracts\CategoryServiceInterface;
use App\Repositories\CategoryRepository;

class CategoryService implements CategoryServiceInterface
{

    private mixed $categoryRepository;

    /**
     *
     */
    public function __construct(){
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * @param $perPage
     * @return mixed
     */
    public function getAllCategories($perPage): mixed
    {
        // TODO: Implement getAllCategories() method.
        return $this->categoryRepository->getCategoriesWithPaginate($perPage);
    }

    public function getCategoriesForCombobox()
    {
        // TODO: Implement getCategoriesForCombobox() method.
        return $this->categoryRepository->getCategoriesForCombobox();
    }
}

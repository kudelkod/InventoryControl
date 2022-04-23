<?php

namespace App\Modules\Categories\src\Services;

use App\Modules\Categories\src\Models\Category;
use App\Modules\Categories\src\Repositories\CategoryRepository;
use App\Modules\Categories\src\Repositories\Contracts\CategoryRepositoryInterface;
use App\Modules\Categories\src\Services\Contracts\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{

    private mixed $categoryRepository;

    /**
     *
     */
    public function __construct(CategoryRepositoryInterface $repository){
        $this->categoryRepository = $repository;
    }

    /**
     * @param $perPage
     * @return mixed
     */
    public function getCategories(): mixed
    {
        // TODO: Implement getAllCategories() method.
        $categories = $this->categoryRepository->getAllCategories();

        return $categories->get()->toArray();
    }

    public function createCategory($data)
    {
        // TODO: Implement createCategory() method.
        return $this->categoryRepository->createCategory($data);
    }

    public function updateCategory($data, $id)
    {
        // TODO: Implement updateCategory() method.
        $this->categoryRepository->updateCategory($data, $id);
    }

    public function deleteCategory($id)
    {
        // TODO: Implement deleteCategory() method.

        return $this->categoryRepository->deleteCategory($id);
    }
}

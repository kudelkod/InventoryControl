<?php

namespace App\Modules\Categories\src\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getAllCategories();

    public function createCategory($data);

    public function updateCategory($data, $id);

    public function deleteCategory($id);
}

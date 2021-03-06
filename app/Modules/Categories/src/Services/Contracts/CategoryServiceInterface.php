<?php

namespace App\Modules\Categories\src\Services\Contracts;

interface CategoryServiceInterface
{
    public function getCategories();

    public function createCategory($data);

    public function updateCategory($data, $id);

    public function deleteCategory($id);
}

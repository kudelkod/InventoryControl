<?php

namespace App\Modules\Categories\src\Services\Contracts;

interface CategoryServiceInterface
{
    public function getCategories();

    public function getCategoriesForCombobox();

    public function createCategory($data);

    public function getCategory($slug);

    public function updateCategory($data, $slug);

    public function deleteCategory($slug);
}

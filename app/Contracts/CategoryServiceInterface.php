<?php

namespace App\Contracts;

interface CategoryServiceInterface
{
    public function getCategoriesWithPaginate($perPage);

    public function getCategoriesForCombobox();

    public function createCategory($data);

    public function getCategory($slug);

    public function updateCategory($data, $slug);

    public function deleteCategory($slug);
}

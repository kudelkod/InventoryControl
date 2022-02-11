<?php

namespace App\Services;

use App\Contracts\CategoryServiceInterface;
use App\Models\Category;
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
    public function getCategoriesWithPaginate($perPage): mixed
    {
        // TODO: Implement getAllCategories() method.
        $categories = $this->categoryRepository->getAllCategories();

        return $categories->paginate($perPage);
    }

    public function getCategoriesForCombobox()
    {
        // TODO: Implement getCategoriesForCombobox() method.
        return $this->categoryRepository->getCategoriesForCombobox();
    }

    public function createCategory($data)
    {
        // TODO: Implement createCategory() method.
        $item = (new Category())->create($data);

        if($item){
            return true;
        }
        else{
            return false;
        }
    }

    public function getCategory($slug)
    {
        // TODO: Implement getCategory() method.
        return $this->categoryRepository->getCategoryBySlug($slug);
    }

    public function updateCategory($data, $slug)
    {
        // TODO: Implement updateCategory() method.

        $item = $this->categoryRepository->getCategoryBySlug($slug);
        $data['parent_category_id'] = $data['parent_category_id'] == $item->id ? 1 : $data['parent_category_id'];

        $result = $item->update($data);

        if($result){
            return true;
        }
        else{
            return  false;
        }
    }

    public function deleteCategory($slug)
    {
        // TODO: Implement deleteCategory() method.
        $item = $this->categoryRepository->getCategoryBySlug($slug);
        $item->destroy($item->id);
//        return ->destroy($slug);
    }
}

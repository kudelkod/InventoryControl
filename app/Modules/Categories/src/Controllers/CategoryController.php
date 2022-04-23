<?php

namespace App\Modules\Categories\src\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\src\Requests\CategoryCreateRequest;
use App\Modules\Categories\src\Requests\CategoryUpdateRequest;
use App\Modules\Categories\src\Services\Contracts\CategoryServiceInterface;

//use App\Http\Requests\CategoryDeleteRequest;

class CategoryController extends Controller
{
    private CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $service)
    {
        $this->categoryService = $service;
    }

    public function index()
    {
        return view('categories::index');
    }

    public function getCategories()
    {
        return $this->categoryService->getCategories();
    }

    public function addCategory(CategoryCreateRequest $request)
    {
        $data = $request->input();

        return $this->categoryService->createCategory($data);
    }

    public function editCategory(CategoryUpdateRequest $request, $id){

        $data = $request->input();

        return $this->categoryService->updateCategory($data, $id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}

<?php

namespace App\Modules\Categories\src\Controllers;

use App\Http\Controllers\Controller;
//use App\Http\Requests\CategoryDeleteRequest;
use App\Modules\Categories\src\Requests\CategoryCreateRequest;
use App\Modules\Categories\src\Requests\CategoryUpdateRequest;
use App\Modules\Categories\src\Services\Contracts\CategoryServiceInterface;

class CategoryController extends Controller
{
    private CategoryServiceInterface $categoryService;
    public function __construct(CategoryServiceInterface $service)
    {
        $this->categoryService = $service;
    }

    /**
     * @param CategoryServiceInterface $service
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function index(){
        return view('categories::index');
    }

    public function getCategories(){
        $categories = $this->categoryService->getCategories();

        return $categories;
    }

    /**
     * @param CategoryServiceInterface $service
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function create(CategoryServiceInterface $service){

        $categoryList = $service->getCategoriesForCombobox();

        return view('admin.categories.create', compact('categoryList'));
    }

    /**
     * @param CategoryCreateRequest $request
     * @param CategoryServiceInterface $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreateRequest $request, CategoryServiceInterface $service){

        $data = $request->input();

        $result = $service->createCategory($data);

        if($result)
            return redirect()->route('categories.index')->with(['success' => 'Успешно создано']);
        else
           return back()->withErrors(['message'=>'Ошибка создания'])->withInput();
    }

    /**
     * @param CategoryServiceInterface $service
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function edit(CategoryServiceInterface $service, $slug){
//        dd($slug);
        $categoryList = $service->getCategoriesForCombobox();

        $category = $service->getCategory($slug);

        return view('admin.categories.edit', compact('category', 'categoryList'));
    }

    /**
     * @param CategoryUpdateRequest $request
     * @param CategoryServiceInterface $service
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, CategoryServiceInterface $service , $slug){

        $data = $request->input();

        $result = $service->updateCategory($data, $slug);

        if($result){
            return redirect()->route('categories.edit', $result->slug)
                ->with(['success'=>'Успешно обновлено']);
        }
        else
            return back()->withErrors(['message'=>'Ошибка создания'])->withInput();


    }


    /**
     * @param CategoryServiceInterface $service
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(CategoryServiceInterface $service, $slug){

        $service->deleteCategory($slug);

        return redirect()->route('categories.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryDeleteRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param CategoryServiceInterface $service
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function index(CategoryServiceInterface $service){

        $categories = $service->getCategoriesWithPaginate(5);

        return view('admin.categories.index', compact('categories'));
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
     * @param CategoryDeleteRequest $request
     * @param CategoryServiceInterface $service
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(CategoryServiceInterface $service, $slug){

        $service->deleteCategory($slug);

        return redirect()->route('categories.index');
    }
}

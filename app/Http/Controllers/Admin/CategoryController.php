<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryServiceInterface;
use App\Http\Controllers\Controller;
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

        $categories = $service->getAllCategories(5);

        return view('admin.index', compact('categories'));
    }
}

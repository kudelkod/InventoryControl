<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ManufactureServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManufactureCreateRequest;
use App\Http\Requests\ManufactureUpdateRequest;
use App\Services\ManufactureService;

class ManufactureController extends Controller
{
    public function index(ManufactureService $service){

        $manufacturers = $service->getManufacturersWithPaginate(10);

        return view('admin.manufacturers.index', compact('manufacturers'));
    }

    public function create(){

        return view('admin.manufacturers.create');
    }

    public function store(ManufactureCreateRequest $request, ManufactureServiceInterface $service){

        $data = $request->input();

        $result = $service->createManufacture($data);

        if($result){
            return redirect()->route('manufacturers.index')->with(['success'=>'Успешно добавлено']);
        }
        else {
            return back()->withErrors(['message' => 'Ошибка создания'])->withInput();
        }
    }

    public function edit(ManufactureServiceInterface $service, $slug){

        $manufacture = $service->getManufacture($slug);

        return view('admin.manufacturers.edit', compact('manufacture'));
    }

    public function update(ManufactureUpdateRequest $request, ManufactureServiceInterface $service, $slug){

        $data = $request->input();

        $result = $service->updateManufacture($data, $slug);

        if($result){
            return redirect()->route('manufacturers.index')->with(['message'=>'Редактирование прошло успешно']);
        }
        else{
            return back()->withErrors(['message'=>'Ошибка редактирования'])->withInput();
        }
    }

    public function delete(ManufactureServiceInterface $service, $slug){

        $result = $service->deleteManufacture($slug);

        if ($result){
            return redirect()->route('manufacturers.index')->with(['message'=>'Успешно удалено']);
        }
        else{
            return back()->withErrors(['message'=>'Ошибка удаления']);
        }
    }
}

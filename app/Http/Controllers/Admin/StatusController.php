<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\StatusServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusAjaxRequest;
use App\Http\Requests\StatusUpdateRequest;

class StatusController extends Controller
{
    public function create()
    {

        return view('admin.statuses.create');
    }

    public function store(StatusAjaxRequest $request, StatusServiceInterface $service){
        $data = $request->input();

        $result = $service->createStatus($data);

        if($result){
            return redirect()->route('statuses.edit')->with(['success'=>'Успешно добавлено']);
        }
        else
            return back()->withErrors(['message'=>'Ошибка создания'])->withInput();
    }

    public function edit(StatusServiceInterface $service){

        $statusList=$service->getAllStatuses();

        return view('admin.statuses.edit',compact('statusList'));
    }

    public function update(StatusAjaxRequest $request, StatusServiceInterface $service){

        $data = $request->input();

        $result = $service->updateStatus($data);

        if($result){
            return redirect()->route('statuses.edit')
                ->with(['success'=>'Успешно сохранено']);
        }
        else
            return back()->withErrors(['message'=>'Ошибка создания'])->withInput();
    }

    public function getAjaxStatus(StatusAjaxRequest $request, StatusServiceInterface $service){

        return $service->getAjaxStatus($request->id);
    }
}

<?php

namespace App\Services;

use App\Contracts\StatusServiceInterface;
use App\Models\Status;
use App\Repositories\StatusRepository;
use Illuminate\Support\Str;

class StatusService implements StatusServiceInterface
{

    private mixed $statusRepository;

    public function __construct(){
        $this->statusRepository = app(StatusRepository::class);
    }

    public function getAllStatuses()
    {
        // TODO: Implement getAllStatuses() method.
        $statusList = $this->statusRepository->getStatusesForCombobox();

        return $statusList;
    }

    public function createStatus($data)
    {
        // TODO: Implement createStatus() method.
        $status = (new Status())->create($data);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateStatus($data){
        // TODO: Implement updateStatus() method.
        $status = $this->statusRepository->getStatusById($data['id']);

        return $status->update($data);
    }

    public function getAjaxStatus($id)
    {
        // TODO: Implement getAbout() method.
        return $this->statusRepository->getAjaxStatus($id);
    }
}

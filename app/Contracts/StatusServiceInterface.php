<?php

namespace App\Contracts;

interface StatusServiceInterface
{
    public function getAllStatuses();

    public function createStatus($data);

    public function getAjaxStatus($id);

    public function updateStatus($data);
}

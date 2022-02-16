<?php

namespace App\Contracts;

interface ModelServiceInterface{
    public function getAllWithPaginate($perPage);

    public function getParameters();

    public function getAjaxTypeId($id);
}

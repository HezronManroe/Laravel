<?php

namespace App\Http\Service;
use App\Http\Requests\StoreDiskonRequest;

interface DiskonInterface extends BaseService
{
    public function checkValidDiskon(StoreDiskonRequest $request);
    public function findAll();
}

<?php

namespace App\Http\Service;

interface BaseService
{
    public function findById($id);
    public function store($request);
    public function update($id, $request);
    public function delete($id);
}

<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use App\Http\Requests\StoreDiskonRequest;
use App\Http\Requests\UpdateDiskonRequest;
use App\Http\Service\DiskonInterface;

class DiskonController extends Controller
{
    private $diskonInterface;

    public function __construct(DiskonInterface $diskonInterface)
    {
        $this->diskonInterface = $diskonInterface;
    }

    public function index()
    {
        return response()->json([
            'code'      => 200,
            'status'    => true,
            'data'      => $this->diskonInterface->findAll(),
            'message'   => 'Success'
        ], 200);

    }

    public function checkValidationDiscount(StoreDiskonRequest $request)
    {
        return response()->json([
            'code'      => 200,
            'status'    => true,
            'data'      => $this->diskonInterface->checkValidDiskon($request),
            'message'   => 'Success'
        ], 200);

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Services\OwnerService;

/**
 * @author emanueldossantoset5@gmail.com
 * Class OwnerController
 * @package App\Http\Controllers\OwnerController
 */
class OwnerController extends Controller
{
    private $ownerService;

    public function __construct(OwnerService $ownerService)
    {
        $this->ownerService = $ownerService;
    }

    /**
     * @param \App\Http\Requests\CarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OwnerRequest $request)
    {
        $params = $request->validated();
        return $this->ownerService->make($params);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Controllers\Controller;
use App\Services\CarService;

/**
 * @author emanueldossantoset5@gmail.com
 * Class CarController
 * @package App\Http\Controllers\Car\CarController
 */
class CarController extends Controller
{
    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->carService->index();
    }

    /**
     * @param \App\Http\Requests\CarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CarRequest $request)
    {
        $params = $request->validated();
        return $this->carService->make($params);
    }

    /**
     * @param request $car_id
     * @return \App\Http\JsonResponse
     */
    public function show($car_id)
    {
        return $this->carService->get($car_id);
    }

    /**
     * @param \App\Http\Requests\CarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CarRequest $request)
    {
        return $this->carService->update($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function allTransactions($id)
    {
        return $this->carService->allTransactions($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @return bool
     */
    public function destroy($id)
    {
        return $this->carService->delete($id);
    }
}

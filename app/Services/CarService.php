<?php

namespace App\Services;

use App\Models\Car;
use App\Repository\Interfaces\CarRepositoryInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Class CarService
 * @package App\Services\CarService
 */
class CarService
{

    private $carRepository;

    public function __construct(
        CarRepositoryInterface $carRepository
    ) {
        $this->carRepository = $carRepository;
    }

    public function index()
    {
        return $this->carRepository->All();
    }

    public function make($attributes)
    {
        return $this->carRepository->save($attributes);
    }

    public function get($car_id)
    {
        return $this->carRepository->findById($car_id);
    }

    public function update($attributes)
    {
        return $this->carRepository->update($attributes);
    }

    public function delete($car_id)
    {
        return $this->carRepository->delete($car_id);
    }

    public function allTransactions($car_id)
    {
        return $this->carRepository->allTransactions($car_id);
    }
}

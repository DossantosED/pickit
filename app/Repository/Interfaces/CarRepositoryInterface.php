<?php

namespace App\Repository\Interfaces;

use App\Repository\Interfaces\RepositoryInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Interface CarRepositoryInterface
 * @package App\Repository\Interfaces\CarRepositoryInterface
 */
interface CarRepositoryInterface extends RepositoryInterface
{
    public function allTransactions($car_id);
}

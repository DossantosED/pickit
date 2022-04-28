<?php

namespace App\Services;

use App\Models\Owner;
use App\Repository\Interfaces\OwnerRepositoryInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Class OwnerService
 * @package App\Services\CarService
 */
class OwnerService
{

    private $ownerService;

    public function __construct(
        OwnerRepositoryInterface $ownerRepository
    ) {
        $this->ownerService = $ownerRepository;
    }

    public function make($attributes)
    {
        return $this->ownerService->save($attributes);
    }
}
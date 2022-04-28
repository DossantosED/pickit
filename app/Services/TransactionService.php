<?php

namespace App\Services;

use App\Repository\Interfaces\TransactionInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Class TransactionService
 * @package App\Services\TransactionService
 */
class TransactionService
{

    private $transactionService;

    public function __construct(
        TransactionInterface $transactionRepository
    ) {
        $this->transactionService = $transactionRepository;
    }

    public function makeService($attributes)
    {
        return $this->transactionService->save($attributes);
    }
    
}
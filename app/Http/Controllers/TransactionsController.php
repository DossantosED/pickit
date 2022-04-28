<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Services\TransactionService;

/**
 * @author emanueldossantoset5@gmail.com
 * Class TransactionsController
 * @package App\Http\Controllers\TransactionsController
 */
class TransactionsController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    /**
     * @param \App\Http\Requests\TransactionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TransactionRequest $request)
    {
        $params = $request->validated();
        return $this->transactionService->makeService($params);
    }
}

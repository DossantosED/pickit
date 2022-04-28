<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('car', [CarController::class, 'store']);
Route::get('cars', [CarController::class, 'index']);
Route::get('car/{id}', [CarController::class, 'show']);
Route::put('car/{id}', [CarController::class, 'update']);
Route::delete('car/{id}', [CarController::class, 'destroy']);
Route::get('car/transactions/{id}', [CarController::class, 'allTransactions']);

Route::post('owner', [OwnerController::class, 'store']);

Route::post('transaction', [TransactionsController::class, 'store']);
<?php

namespace App\Repository;

use App\Models\Car;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\TransactionInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Class TransactionRepository
 * @package App\Repository
 */
class TransactionRepository implements TransactionInterface
{
    /* Consts */
    const MSG_GREY = "Por politicas del taller NO se permite brindar el servicio de Pintura para autos de color GRIS";
    const MSG_SUCCESS = "Transaccion creada correctamente.";
    const MSG_ERROR = "Error al crear la Transaccion:";
    const NO_COLOUR = "GREY";
    const SV_PAINT = 12;

    /**
     * @param Transaction $model
     */
    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
    }

    public function findById($owner_id)
    {
        abort(404);
    }

    public function save($attributes)
    {
        try {
            $car = $this->validateCars($attributes['car_id'], $attributes['owner_id']);
            $car_colour = strtoupper($car->colour);
            $services = $attributes['services'];
            if(!$this->validateServices($car_colour, $services)){
                return response()->json([
                    'message'       => 	self::MSG_GREY,
                    'transaccion'   => null
                ], 400);
            }
            $total_price = $this->getTotalPrice($services);
            $transaction = new Transaction();
            $transaction->owner_id = $attributes['owner_id'];
            $transaction->car_id = $attributes['car_id'];
            $transaction->services = join(",", $services);
            $transaction->total_price = $total_price;
            $transaction->save();
            return response()->json([
                'message'		=> 	SELF::MSG_SUCCESS,
                'transaccion'   => 	$transaction,
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([SELF::MSG_ERROR => $th->getMessage()], 500);
        }
    }

    private function getTotalPrice($services)
    {
        $total_price = 0;
        foreach ($services as $sv) {
            $total_price += Service::findOrFail($sv)->price;
        }
        return $total_price;
    }

    private function validateServices($car_colour, $services)
    {
        foreach ($services as $sv) {
            if($car_colour == SELF::NO_COLOUR && $sv == SELF::SV_PAINT){
                return false;
            }
        }
        return true;
    }

    private function validateCars($car_id, $owner_id)
    {
        $car = Car::findOrFail($car_id);
        if($car->owner_id === $owner_id){
            return $car;
        }
        abort(403);
    }

    public function update($model, array $attributes = [])
    {
        abort(404);
    }

    /**
     * @param $model
     * @return bool
     */
    public function delete($model): bool
    {
        abort(404);
    }

    public function all()
    {
        abort(404);
    }
}

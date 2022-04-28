<?php

namespace App\Repository;

use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\CarRepositoryInterface;
/**
 * @author emanueldossantoset5@gmail.com
 * Class CarRepository
 * @package App\Repository
 */
class CarRepository implements CarRepositoryInterface
{

    const MSG_SUCCESS_FIND = 'Auto encontrado correctamente.';
    const MSG_ERROR_FIND = 'Error al buscar el auto: ';
    const MSG_SUCCESS_SAVE = 'Auto creado correctamente.';
    const MSG_ERROR_SAVE = 'Error al crear el auto: ';
    const MSG_SUCCESS_UPDATE = 'Auto actualizado correctamente.';
    const MSG_ERROR_UPDATE = 'Error al actualizar el auto.';
    const MSG_SUCCESS_DELETE = 'Auto eliminado correctamente.';
    const MSG_ERROR_DELETE = 'Error al intentar eliminar el auto.';
    const MSG_HISTORY = 'Historial de servicios:';
    const MSG_ERROR_HISTORY = 'Error al obtener historial de servicios.';
    const MSG_ALL_CARS = 'Lista de autos:';

    /**
     * @param Car $model
     */
    public function __construct(Car $car)
    {
        $this->model = $car;
    }

    public function findById($car_id)
    {
        try {
            $car = Car::with('owner')->findOrFail($car_id);
            return response()->json([
                'message'		=> 	SELF::MSG_SUCCESS_FIND,
                'car' 			=> 	$car
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([SELF::MSG_ERROR_FIND => $th->getMessage()], 500);
        }
    }

    public function save($attributes)
    {
        try {
            $car = new Car();
            $car->brand = $attributes['brand'];
            $car->model = $attributes['model'];
            $car->year = $attributes['year'];
            $car->patent = $attributes['patent'];
            $car->colour = $attributes['colour'];
            $car->owner_id = isset($attributes['owner_id']) ? $attributes['owner_id'] : null;
            $car->save();
            return response()->json([
                'message'		=> 	SELF::MSG_SUCCESS_SAVE,
                'car' 			=> 	$car,
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([SELF::MSG_ERROR_SAVE => $th->getMessage()], 500);
        }
    }

    public function update($attributes)
    {
        try {
            $car = Car::findOrFail($attributes->id);
            $car->update($attributes->all());
            return response()->json([
                'message'   =>  SELF::MSG_SUCCESS_UPDATE,
                'car'       => $car->get(),
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([SELF::MSG_ERROR_UPDATE => $th->getMessage()], 500);
        }
    }

    /**
     * @param $car_id
     * @return bool
     */
    public function delete($car_id)
    {
        try {
            $car = Car::findOrFail($car_id);
            $transactions = Transaction::where('car_id', $car_id);
            $transactions->delete();
            $car->delete();
            return response()->json([
                'message'   =>  SELF::MSG_SUCCESS_DELETE
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([self::MSG_ERROR_DELETE => $th->getMessage()], 500);
        }
    }

    public function all()
    {
        $cars = Car::with('owner')->get();
        return response()->json([
            'message'		=> 	SELF::MSG_ALL_CARS,
            'cars' 			=> 	$cars,
        ], 200);
    }

    public function allTransactions($car_id)
    {
        try {
            $transactions = Transaction::where('car_id', $car_id)->get();
            return response()->json([
                'message'       =>  SELF::MSG_HISTORY,
                'transactions'  => $transactions
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([SELF::MSG_ERROR_HISTORY => $th->getMessage()], 500);
        }
    }
}

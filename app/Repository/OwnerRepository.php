<?php

namespace App\Repository;

use App\Models\Owner;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\OwnerRepositoryInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Class OwnerRepository
 * @package App\Repository
 */
class OwnerRepository implements OwnerRepositoryInterface
{

    const MSG_SUCCESS = 'Propietario creado correctamente.';
    const MSG_ERROR = 'Error al crear el propietario: ';
    /**
     * @param Owner $model
     */
    public function __construct(Owner $owner)
    {
        $this->model = $owner;
    }

    public function findById($owner_id)
    {
        abort(404);
    }

    public function save($attributes)
    {
        try {
            $owner = new Owner();
            $owner->name = $attributes['name'];
            $owner->surname = $attributes['surname'];
            $owner->save();
            return response()->json([
                'message'		=> 	SELF::MSG_SUCCESS,
                'owner'   => 	$owner,
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([SELF::MSG_ERROR => $th->getMessage()], 500);
        }
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

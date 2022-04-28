<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'owner_id',
        'car_id',
        'services'
    ];

    public function owner()
    {
        return $this->hasOne(Owner::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }
}

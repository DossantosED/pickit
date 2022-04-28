<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'patent',
        'colour',
        'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
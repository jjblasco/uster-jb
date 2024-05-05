<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'brand',
        'model',
        'plate',
        'licenseRequired',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}

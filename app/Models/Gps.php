<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model
    protected $table = 'gps';

    // Allow mass assignment for the specified fields
    protected $fillable = [
        'time',
        'latitude',
        'longitude',
        'altitude',
        'velocity'
    ];

    // Automatically cast attributes to their respective types
    protected $casts = [
        'time' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
        'altitude' => 'float',
        'velocity' => 'float',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thermal extends Model
{
    use HasFactory;

    protected $table = 'thermal'; // اسم الجدول المرتبط بالموديل

    protected $fillable = [
        'time',
        'internal_temperature',
        'external_temperature',
        'battery_temperature',
        'cooling_status',
        'radiator_status',
        'thermal_alert',
    ];

    protected $casts = [
        'time' => 'datetime',
        'internal_temperature' => 'float',
        'external_temperature' => 'float',
        'battery_temperature' => 'float',
        'cooling_status' => 'string',
        'radiator_status' => 'boolean',
        'thermal_alert' => 'boolean',
    ];
}
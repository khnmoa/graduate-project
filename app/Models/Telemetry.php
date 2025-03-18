<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telemetry extends Model
{
    use HasFactory;

    protected $table = 'telemetry'; // اسم الجدول

    protected $fillable = [
        'time',
        'sensor_telemetry',
        'sensor_gps',
        'sensor_communication',
        'sensor_thermal',
        'sensor_payload',
        'sensor_control',
        'sensor_obc',
        'status'
    ];

    public $timestamps = true; // لتفعيل timestamps (created_at & updated_at)
}
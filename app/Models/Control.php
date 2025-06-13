<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $table = 'controls'; // اسم الجدول

    protected $fillable = [
        'telemetry_id','subsystem_name',
        'gyroscope_x', 'gyroscope_y', 'gyroscope_z',
        'magnetometer_x', 'magnetometer_y', 'magnetometer_z',
        'system_status', 'control_mode', 'time',
    ];

    protected $casts = [
        'time' => 'datetime',
        'gyroscope_x' => 'float',
        'gyroscope_y' => 'float',
        'gyroscope_z' => 'float',
        'magnetometer_x' => 'float',
        'magnetometer_y' => 'float',
        'magnetometer_z' => 'float',
    ];

    // العلاقة مع جدول telemetry
    public function telemetry()
    {
        return $this->belongsTo(Telemetry::class);
    }

    // العلاقة مع جدول commands
    public function commands()
    {
        return $this->hasMany(Command::class);
    }

    // العلاقة مع جدول subsystem
    public function subsystem()
    {
        return $this->belongsTo(Subsystem::class, 'subsystem_name', 'name');
    }
}

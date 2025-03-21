<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telemetry extends Model
{
    use HasFactory;

    protected $table = 'telemetry'; // اسم الجدول

    protected $fillable = [
        'subsystem_name',
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

    // العلاقات

    public function gps()
    {
        return $this->hasMany(Gps::class);
    }

    public function obcs()
    {
        return $this->hasMany(Obc::class);
    }

    public function communications()
    {
        return $this->hasMany(Communication::class);
    }

    public function thermals()
    {
        return $this->hasMany(Thermal::class);
    }

    public function controls()
    {
        return $this->hasMany(Control::class);
    }

    public function powers()
    {
        return $this->hasMany(Power::class);
    }

    public function commands()
    {
        return $this->hasMany(Command::class);
    }

    public function Subsystem()
    {
        return $this->belongsTo(Subsystem::class, 'subsystem_name', 'name');
    }
}

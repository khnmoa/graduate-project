<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obc extends Model
{
    use HasFactory;

    protected $table = 'obcs'; // اسم الجدول

    protected $fillable = [
        'power_id',
        'telemetry_id',
        'communications_id',
        'time',
        'cpu_usage',
        'memory_usage',
        'cpu_temperature',
        'memory_temperature',
        'uptime',
        'error_logs',
        'firmware_version',
        'operating_mode',
        'subsystem_name'
    ];

    public $timestamps = true;

    // العلاقات

    public function power()
    {
        return $this->belongsTo(Power::class);
    }

    public function telemetry()
    {
        return $this->belongsTo(Telemetry::class);
    }

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

    public function commands()
    {
        return $this->hasMany(Command::class);
    }

    public function subsystem()
    {
        return $this->belongsTo(Subsystem::class, 'subsystem_name', 'name');
    }
}

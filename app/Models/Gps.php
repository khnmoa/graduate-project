<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    use HasFactory;

    protected $table = 'gps';

    protected $fillable = [
        'telemetry_id',
        'time',
        'latitude',
        'longitude',
        'altitude',
        'velocity',
        'subsystem_name'
    ];

    protected $casts = [
        'time' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
        'altitude' => 'float',
        'velocity' => 'float',
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

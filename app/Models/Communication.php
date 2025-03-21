<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $table = 'communications'; // Table name

    protected $fillable = [
        'subsystem_name',
        'time',
        'signal_strength',
        'data_rate',
        'latency',
        'status',
    ];

    // العلاقة مع جدول OBCs
    public function obcs()
    {
        return $this->hasMany(Obc::class);
    }

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

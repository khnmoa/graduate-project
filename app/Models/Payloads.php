<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payload extends Model {
    use HasFactory;

    protected $fillable = [
        'telemetry_id',
        'memory_size',
        'compression_ratio',
        'compression_ratio_value',
        'payload_type',
        'subsystem_name',
    ];

    public function telemetrys() {
        return $this->belongsTo(Telemetrys::class, 'telemetry_id');
    }
    
    public function Subsystem() {
        return $this->belongsTo(Subsystem::class, 'subsystem_name', 'name');
    }
}
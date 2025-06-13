<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $primaryKey = 'code'; // لأنك تستخدم code كـ Primary Key
    public $incrementing = false;  // لأنه ليس auto-increment
    protected $keyType = 'int';    // ونوعه integer

    protected $fillable = [
        'code',
        'name',
        'description',
        'subsystem_name',

    ];

    
    // العلاقات مع الجداول الأخرى
    public function subsystem()
    {
        return $this->belongsTo(Subsystem::class, 'subsystem_name', 'name');
    }

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

    public function obc()
    {
        return $this->belongsTo(Obc::class);
    }

    public function power()
    {
        return $this->belongsTo(Power::class);
    }

    public function gps()
    {
        return $this->belongsTo(Gps::class);
    }

    public function control()
    {
        return $this->belongsTo(Control::class);
    }

    public function payload()
    {
        return $this->belongsTo(Payload::class);
    }

    public function thermal()
    {
        return $this->belongsTo(Thermal::class);
    }

    public function telemetry()
    {
        return $this->belongsTo(Telemetry::class);
    }

    public function userCommands()
    {
        return $this->hasMany(UserCommand::class, 'command_code', 'code');
    }
}

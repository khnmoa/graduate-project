<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsystem extends Model
{
    use HasFactory;

    protected $table = 'subsystems' ;

    protected $fillable = [
        'name',
    ];

    // العلاقات مع مكونات النظام
    public function communication()
    {
        return $this->belongsTo(Communication::class , 'subsystem_name', 'name');
    }

    public function obc()
    {
        return $this->belongsTo(Obc::class,'subsystem_name', 'name');
    }

    public function power()
    {
        return $this->belongsTo(Power::class,'subsystem_name', 'name');
    }

    public function gps()
    {
        return $this->belongsTo(Gps::class,'subsystem_name', 'name');
    }

    public function control()
    {
        return $this->belongsTo(Control::class,'subsystem_name', 'name');
    }

    public function payload()
    {
        return $this->belongsTo(Payload::class,'subsystem_name', 'name');
    }

    public function thermal()
    {
        return $this->belongsTo(Thermal::class,'subsystem_name', 'name');
    }

    public function telemetry()
    {
        return $this->belongsTo(Telemetry::class,'subsystem_name', 'name');
    }

    // العلاقة مع الأوامر (Commands)
    public function commands()
    {
        return $this->hasMany(Command::class,'subsystem_name', 'name');
    }
}

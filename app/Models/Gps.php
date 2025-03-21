<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    use HasFactory;

    protected $fillable = ['telemetry_id', 'time', 'latitude', 'longitude', 'altitude', 'velocity', 
    'subsystem_name', ];

    // تعريف العلاقة مع جدول telemetry
    public function telemetrys()
    {
        return $this->belongsTo(Telemetrys::class);
    }
    public function Commands()
    {
        return $this->hasMany(Commands::class);
    }

    public function subsystem()
    {
        return $this->belongsTo(Subsystem::class, 'subsystem_name', 'name');
    }
}
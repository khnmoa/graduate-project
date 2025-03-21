<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'users_name',
        'Battery_voltage',
        'Battery_level',
        'Time_at',
        'subsystem_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function obcs()
    {
        return $this->hasMany(Obcs::class);
    }

    public function telemetrys()
    {
        return $this->hasMany(Telemetrys::class);
    }

    public function commands()
    {
        return $this->hasMany(Commands::class);
    }

    public function subsystem()
    {
        return $this->belongsTo(Subsystem::class, 'subsystem_name', 'name');
    }
}

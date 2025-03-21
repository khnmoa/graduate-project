<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    use HasFactory;

<<<<<<< HEAD
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
=======
    // Specify the table name if it's not the plural form of the model
    protected $table = 'gps';

    // Allow mass assignment for the specified fields
    protected $fillable = [
        'time',
        'latitude',
        'longitude',
        'altitude',
        'velocity'
    ];

    // Automatically cast attributes to their respective types
    protected $casts = [
        'time' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
        'altitude' => 'float',
        'velocity' => 'float',
    ];
}
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5

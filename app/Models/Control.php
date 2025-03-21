<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $table = 'control'; // اسم الجدول

    protected $fillable = [
<<<<<<< HEAD
        'subsystem_name',
=======
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5
        'gyroscope_x', 'gyroscope_y', 'gyroscope_z',
        'magnetometer_x', 'magnetometer_y', 'magnetometer_z',
        'system_status', 'control_mode', 'time',
    ];

    protected $casts = [
        'time' => 'datetime',
        'gyroscope_x' => 'float',
        'gyroscope_y' => 'float',
        'gyroscope_z' => 'float',
        'magnetometer_x' => 'float',
        'magnetometer_y' => 'float',
        'magnetometer_z' => 'float',
    ];
<<<<<<< HEAD

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
=======
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5
}
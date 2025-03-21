<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Obc extends Model
=======
class OBC extends Model
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5
{
    use HasFactory;

    protected $table = 'obc'; // Define the table name

    protected $fillable = [
<<<<<<< HEAD
        'power_id', 'telemetry_id', 'communications_id', 
        'time', 'cpu_usage', 'memory_usage', 'cpu_temperature',
        'memory_temperature', 'uptime', 'error_logs',
        'firmware_version', 'operating_mode', 'subsystem_name',
    ];

    public $timestamps = true; // Laravel will handle created_at & updated_at

    // العلاقة مع جدول power
    public function powers()
    {
        return $this->belongsTo(Powers::class);
    }

    // العلاقة مع جدول telemetry
    public function telemetrys()
    {
        return $this->belongsTo(Telemetrys::class);
    }

    // العلاقة مع جدول communications
    public function communications()
    {
        return $this->belongsTo(Communications::class);
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
        'time', 'cpu_usage', 'memory_usage', 'cpu_temperature',
        'memory_temperature', 'uptime', 'error_logs',
        'firmware_version', 'operating_mode'
    ];

    public $timestamps = true; // Laravel will handle created_at & updated_at
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5
}

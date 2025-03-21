<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $table = 'communications'; // Table name

    protected $fillable = [
<<<<<<< HEAD
        'subsystem_name',
=======
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5
        'time',
        'signal_strength',
        'data_rate',
        'latency',
        'status',
    ];
<<<<<<< HEAD

    public function obcs()
    {
        return $this->hasMany(Obcs::class);
    }

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
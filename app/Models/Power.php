<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory;
  
<<<<<<< HEAD
    protected $fillable = ['user_id', 'users_name', 'Battery_voltage', 'Battery_level', 'Time_at','subsystem_name'];
=======
    protected $fillable = ['user_id', 'users_name', 'Battery_voltage', 'Battery_level', 'Time_at'];
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5

    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD



    public function obcs()
    {
        return $this->hasMany(Obcs::class);
    }
    public function telemetrys()
    {
        return $this->hasMany(Telemetrys::class);
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

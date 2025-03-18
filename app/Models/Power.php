<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory;
  
    protected $fillable = ['user_id', 'users_name', 'Battery_voltage', 'Battery_level', 'Time_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

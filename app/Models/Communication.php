<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $table = 'communications'; // Table name

    protected $fillable = [
        'time',
        'signal_strength',
        'data_rate',
        'latency',
        'status',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OBC extends Model
{
    use HasFactory;

    protected $table = 'obc'; // Define the table name

    protected $fillable = [
        'time', 'cpu_usage', 'memory_usage', 'cpu_temperature',
        'memory_temperature', 'uptime', 'error_logs',
        'firmware_version', 'operating_mode'
    ];

    public $timestamps = true; // Laravel will handle created_at & updated_at
}

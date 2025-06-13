<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCommand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'command_code',
        'command_name',
        'command_description',
        'time_type',
        'time' ,
        'session_name',    // إضافة session_name
        'start_date',      // إضافة start_date
        'end_date'         // إضافة end_date
    ];

    // ربط المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ربط الأمر
    public function command()
    {
        return $this->belongsTo(Command::class, 'command_code', 'code');
    }
}

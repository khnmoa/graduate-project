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
        'time'
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
<<<<<<< HEAD
}
=======
}
>>>>>>> b754548ab405806baa10a009a4e73d41ffba7ed5

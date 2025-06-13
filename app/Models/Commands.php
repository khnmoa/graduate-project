<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commands extends Model
{
    use HasFactory;

    // تحديد الأعمدة المسموح بتعبئتها مباشرة
    protected $fillable = ['code', 'name', 'description', 'subsystem', 'time'];

    /**
     * Scope لفلترة الأوامر بناءً على الـ Subsystem
     */
    public function scopeOfSubsystem($query, $subsystem)
    {
        return $query->where('subsystem', $subsystem);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commands extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'description', 'subsystem'];

    public function scopeOfSubsystem($query, $subsystem)
    {
        return $query->where('subsystem', $subsystem);
    }

}

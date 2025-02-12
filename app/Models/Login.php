<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $fillable =['first_name','last_name','email',	'password',	'image','role',	'nationality'];
    protected $tabla ='logins';
}

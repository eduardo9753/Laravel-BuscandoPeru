<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'edad',
        'fecha_suceso',
        'lugar_suceso',
        'imagen',
        'adicional',
        'celular',
        'country_id',
        'state_id',
        'user_id'
    ];
}

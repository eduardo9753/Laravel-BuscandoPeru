<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'tez',
        'cabello',
        'ojos',
        'nariz',
        'boca',
        'contextura',
        'estatura',
        'person_id'
    ];
}

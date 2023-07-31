<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particularity extends Model
{
    use HasFactory;

    protected $fillable = [
        'vestimenta',
        'ultima_vista',
        'observaciones',
        'person_id'
    ];
}

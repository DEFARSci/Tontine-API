<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membres extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'adress',
        'email',
        'telephone',
        'nombre_main'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    use HasFactory;
    protected $fillable = [

        'nombre',
        'apellido',
        'rut',

        'fecha_nacimiento',
        'id_especialidad'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    protected $primaryKey = 'id_reserva';
    use HasFactory;
    protected $fillable = [

        'id_fecha',
        'id_persona',
        'id_especialista',
        'id_especialidad',


    ];
}

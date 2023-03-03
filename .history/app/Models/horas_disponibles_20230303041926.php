<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horas_disponibles extends Model
{
    protected $primaryKey = 'id_fecha';
    use HasFactory;
    protected $fillable = [

        'fecha',
        'hora',
        'id_especialista',
        'id_Estado',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';
    protected $fillable = [
        'hora_inicio',
        'fecha',
        'ubicacion',
        'descripcion',
        'estado',
        'adm_id',
        'tec_id',
        'cli_id',
    ];
}

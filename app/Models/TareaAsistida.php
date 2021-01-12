<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaAsistida extends Model
{
    use HasFactory;

    protected $table = 'tarea_asistida';
    protected $fillable = [
        'hora_llegada',
        'hora_terminada',
        'ubicacion',
        'fecha',
        'tec_id',
        'tarea_id'
    ];
}

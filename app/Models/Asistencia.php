<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'asistencias';
    public $timestamps=false;
    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'fecha',
        'ubicacion',
        'tec_id'
    ];
}

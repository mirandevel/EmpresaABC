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

    public function technical()
    {
        return $this->belongsTo(User::class,'tec_id','id');
    }
    public function administrator()
    {
        return $this->belongsTo(User::class,'adm_id','id');
    }
    public function client()
    {
        return $this->belongsTo(Cliente::class,'cli_id');
    }
}

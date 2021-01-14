<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'correo',
    ];
    public function tasks()
    {
        return $this->hasMany(Tarea::class,'cli_id','id');
    }
}

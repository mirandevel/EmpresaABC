<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FCMToken extends Model
{
    use HasFactory;
    protected $table='fcm_tokens';
    protected $fillable=[
      'token',
      'tec_id'
    ];
}

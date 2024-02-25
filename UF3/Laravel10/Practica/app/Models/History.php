<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'lineas_de_historial';
    protected $fillable=[
        'idmascota','id','fecha','motivo_visita','descripcion'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $table = "tb_almacen";
    protected $primaryKey = "folio";
    protected $fillable = [
        'id_empleado',
        'id_cliente',
        'dia_salida',
        'dia_entrada',
        'comentarios',
        'entregado',
        'tipo',
        'autorizado',

    ];
}

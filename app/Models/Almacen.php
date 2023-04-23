<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $table = "tb_almacen";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_empleado',
        'id_cliente',
        'id_autorizacion',
        'dia_salida',
        'dia_entrada',
        'comentarios',

    ];
}

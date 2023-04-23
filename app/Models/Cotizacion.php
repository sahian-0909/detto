<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $table ="cotizacions";
    protected $primaryKey ="folio";
    protected $fillable =[        
        'id_empleado',
        'id_cliente',
        'tipo',
        'subtotal',
        'descuento',
        'impuestos',
        'total'
    ];
}

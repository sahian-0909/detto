<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleViaticos extends Model
{
    use HasFactory;

    protected $table = 'detalle_viaticos';
    protected $fillable = [
        'viaticos_id',
        'kilometraje_id',
        'km',
        'precio',
    ];

    //Relacion uno a muchos inversa de Ventas a Detalle Ventas
    public function viatico(){
        return $this->belongsTo(Viatico::class);
    }

    //Relacion uno a muchos inversa de Compras a Productos
    public function kilometraje(){
        return $this->belongsTo(Kilometraje::class);
    }
}

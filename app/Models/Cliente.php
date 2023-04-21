<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'nombre_compania',
        'razon_social',
        'nombre_contacto',
        'puesto_contacto',
        'correo_compania',
        'correo_contacto',
        'telefono_compania',
        'telefono_contacto',
        'domicilio_compania'
    ];

    //Relacion uno a muchos de Usuarios a Ventas
    public function viatico(){
        return $this->hasMany(Viatico::class);
    }
}

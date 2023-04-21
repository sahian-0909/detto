<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    use HasFactory;

    protected $table = 'viaticos';
    protected $fillable = [
        'cliente_id',
        'user_id',
        'km',
        'fecha',
        'total',
        'comentarios',
        'estatus',
        'img',
    ];

    //Relacion uno a muchos inversa de Ventas a Usuarios
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos inversa de Ventas a Clientes
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    //Relacion uno a muchos 
    public function detalleViaticos(){
        return $this->hasMany(DetalleViaticos::class);
    }
}

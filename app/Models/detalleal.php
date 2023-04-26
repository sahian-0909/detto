<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleal extends Model
{
    use HasFactory;
    protected $table ="tb_detalleal";
    protected $primaryKey ="id";
    protected $fillable =[
        'folio',
        'id_prenda',
        'tip_entrega',
        'tip_prenda',
        'tallas',
        'producto',
        'color',
        'codigo',
        'tallas',
    ];
}

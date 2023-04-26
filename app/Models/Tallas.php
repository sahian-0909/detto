<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tallas extends Model
{
    use HasFactory;
    protected $table = "tb_tallas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_prenda',
        'talla',

    ];
}

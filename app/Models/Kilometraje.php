<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kilometraje extends Model
{
    use HasFactory;
    protected $table ="kilometrajes";
    protected $primaryKey ="id";
    protected $fillable =[
        'costo'
    ];

    public function viatico(){
        return $this->hasMany(Viatico::class);
    }

}

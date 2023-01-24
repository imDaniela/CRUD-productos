<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variaciones extends Model
{
    use HasFactory;

    public $table = 'variaciones';

    public $fillable = [
        'producto_id',
        'referencia',
        'descripcion',
        'precio',
    ];

    public function Producto(){
        return $this->hasOne(Productos::class,'id','producto_id');
    }
}

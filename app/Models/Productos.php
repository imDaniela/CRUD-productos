<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    public $table = 'productos';

    public $fillable = [
        'nombre',
        'referencia',
        'descripcion',
        'precio',
    ];
}

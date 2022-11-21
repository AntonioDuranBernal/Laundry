<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleNotaServicio extends Model
{
        use HasFactory;
     protected $fillable = [
        'id',
        'idNota',
        'idArticulo',
        'idServicio',
        'descripcion',
        'subtotal',
        'estado',
        'cantidad',
    ];
}

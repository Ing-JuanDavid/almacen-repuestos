<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $primaryKey = 'producto_id';

    public $incrementing = true;
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_venta',
        'precio_compra',
        'categoria',
        'cantidad',
        'stock_minimo'
    ];
}

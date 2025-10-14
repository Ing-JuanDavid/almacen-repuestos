<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallesVenta extends Model
{

    protected $primaryKey = 'detalle_venta_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'detalle_venta_id',
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    
    protected $primaryKey = 'venta_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'cliente_id',
        'usuario_id',
        'total',
        'estado',
        'fecha'
    ];
}

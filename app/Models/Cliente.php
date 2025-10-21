<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model

{
    protected $primaryKey = 'cliente_id';

    public $incrementing = false; 
    
    protected $keyType = 'int'; 
    
    protected $fillable = [
        'cliente_id', 
        'nombre', 
        'apellido', 
        'email', 
        'telefono', 
        'direccion'
    ];
}

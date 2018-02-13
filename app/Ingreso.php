<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable=[
        'id',
        'fecha_ingreso',
        'tipo_comprobante',
        'num_comprobante',
        "proveedora_id"
    ];
}

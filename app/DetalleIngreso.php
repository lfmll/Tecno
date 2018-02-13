<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $fillable=[
      "ingreso_id","producto_id"  
    ];
}

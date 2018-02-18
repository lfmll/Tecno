<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    public function ingreso(){
        return $this->belongsTo(Ingreso::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    protected $fillable=[
      "ingreso_id","producto_id"  
    ];
}

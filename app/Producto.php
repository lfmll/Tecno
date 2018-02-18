<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable=["categoria_id","marca_id"];

    public function marca(){
        return $this->belongsTo(Marca::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function detallei(){
        return $this->hasMany(DetalleIngreso::class);
    }
}

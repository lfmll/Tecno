<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function producto(){
        return $this->hasMany(Producto::class);
    }
}

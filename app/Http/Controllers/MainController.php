<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class MainController extends Controller
{
    public function home(){
        $products= Producto::all();
        return view('main.home',["producto"=>$products]);
    }
}

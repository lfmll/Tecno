@extends('layouts.app')
@section('title','Tecnologia Web')

@section('content')
    <h1>Bienvenidos</h1>
    <div class="container text-center product-container">
        @foreach($producto as $product)
            @include("producto.producto",["product"=>$product])
        @endforeach
    </div>
    @endsection


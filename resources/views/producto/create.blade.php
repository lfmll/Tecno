@extends("layouts.app")

@section("content")
    <div class="container white">
        <h1>Nuevo Producto</h1>
        <!-- Formulario -->
        @include('producto.form',['product'=>$product,'url'=>'/producto','method'=>'POST'])
    </div>

@endsection
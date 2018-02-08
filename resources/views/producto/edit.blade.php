@extends("layouts.app")
@section("content")
<div class="container white">
    <h1>Editar Producto</h1>
    <!-- Formulario -->
    @include('producto.form',['Producto'=>$product,'url'=>'/producto/'.$product->id,'method'=>'PATCH'])
</div>

@endsection
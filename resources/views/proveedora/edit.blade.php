@extends("layouts.app")
@section("content")
    <div class="container white">
        <h1>Modificar Proveedor</h1>
        @include('proveedora.form',['proveedora'=>$proveedora,'url'=>'/proveedora/'.$proveedora->id,'method'=>'PATCH'])
    </div>
    @endsection
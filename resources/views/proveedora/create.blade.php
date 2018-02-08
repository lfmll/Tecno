@extends("layouts.app")
@section("content")
    <div class="container white">
        <h1>Nueva Proveedora</h1>
        @include('proveedora.form',['proveedora'=>$proveedora,'url'=>'/proveedora','method'=>'POST'])
    </div>
    @endsection
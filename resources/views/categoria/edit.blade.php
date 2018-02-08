@extends("layouts.app")
@section("content")
    <div class="container white">
        <h1>Modificar Categoria</h1>
        @include('categoria.form',['Categoria'=>$categoria,'url'=>'/categoria/'.$categoria->id,'method'=>'PATCH'])
    </div>
    @endsection
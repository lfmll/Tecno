@extends("layouts.app")

@section("content")
    <div class="container white">
        <h1>Nueva Marca</h1>
        @include('marca.form',['marca'=>$marca,'url'=>'/marca','method'=>'POST'])
    </div>
    @endsection
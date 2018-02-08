@extends("layouts.app")
@section("content")
    <div class="container white">
        <h1>Modificar Marca</h1>
        @include('marca.form',['Marca'=>$marca,'url'=>'/marca/'.$marca->id,'method'=>'PATCH'])
    </div>
    @endsection

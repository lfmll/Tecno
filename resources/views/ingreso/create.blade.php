@extends("layouts.app")

@section("content")
    <div class="container white">
        <h1>Nuevo Ingreso</h1>
        <!-- Formulario -->
        @include('ingreso.form',['ingreso'=>$ingreso,'url'=>'/ingreso','method'=>'POST'])
    </div>

@endsection


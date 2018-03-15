@extends("layouts.app")
@section("content")
<div class="big-padding text-center blue-grey white-text">
    <h1>Clientes</h1>    
</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre</td>                
                <td>Correo</td>
                <td>Acciones</td>
            </tr>            
        </thead>
        <tbody>
            @foreach($cliente as $cli)
            <tr>
                <td>{{$cli->id}}</td>
                <td>{{$cli->nombre}}</td>
                <td>{{$cli->email}}</td>
                <td>
                    <a href="#">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Importaciones Arevillca</div>

                <div class="panel-body">
                    Usuario Logeado!
                </div>
            </div>
            <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>
                            <a href="{{url("/marca")}}">Ver Marcas</a>
                        </td>
                        <td>
                            <a href="{{url("/categoria")}}">Ver Categorias</a>
                        </td>
                        <td>
                            <a href="{{url("/proveedora")}}">Ver Proveedores</a>
                        </td>
                        <td>
                            <a href="{{url("/producto")}}">Ver Productos</a>
                        </td>                           
                        <td>
                            <a href="{{url("/ingreso")}}">Ver Ingresos</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
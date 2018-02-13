@extends("layouts.app")
@section("content")

    <div class="big-padding text-center blue-grey white-text">
        <h1>Ingresos</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Fecha</td>
                <td>Comprobante</td>
                <td>Proveedor</td>                
                <td>Opcion</td>                
            </tr>
            </thead>
            <tbody>
            @foreach($ingreso as $in)
                <tr>
                    <td>{{$in->id}}</td>
                    <td>{{$in->fecha_ingreso}}</td>
                    <td>{{$in->tipo_comprobante.': '.$in->num_comprobante}}</td>
                    <td>{{$in->proveedora->nombre}}</td>
                    <td>
                        <a class="btn btn-primary">
                           Detalle
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div class="floating">
        <a href="{{url('/ingreso/create')}}" class="btn btn-primary btn-fab">
            <i class="material-icons">add</i>
        </a>
        </div>
@endsection	
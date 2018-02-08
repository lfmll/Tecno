@extends("layouts.app")
@section("content")
    <div class="big-padding text-center blue-grey white-text">
        <h1>Proveedores</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Telefono</td>
            <td>Direccion</td>
            <td>Accion</td>
        </tr>
        </thead>
        <tbody>
             @foreach($proveedora as $prov)
                 <tr>
                     <td>{{$prov->id}}</td>
                     <td>{{$prov->nombre}}</td>
                     <td>{{$prov->telefono}}</td>
                     <td>{$prov->direccion}}</td>
                     <td>
                         <a href="{{url('/proveedora/'.$proveedora->id.'/edit')}}"class="btn btn-primary">
                             Editar
                         </a>
                     </td>
                 </tr>
                 @endforeach
        </tbody>
        </table>
        <div class="floating">
        <a href="{{url('/proveedora/create')}}" class="btn btn-primary btn-fab">
            <i class="material-icons">add</i>
        </a>
        </div>
    </div>
    @endsection
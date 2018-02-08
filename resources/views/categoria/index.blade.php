@extends("layouts.app")
@section("content")
    <div class="big-padding text-center blue-grey white-text">
        <h1>Categorias</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Accion</td>
        </tr>
        </thead>
        <tbody>
             @foreach($categorias as $categoria)
                 <tr>
                     <td>{{$categoria->id}}</td>
                     <td>{{$categoria->nombre}}</td>
                     <td>{{$categoria->descripcion}}</td>
                     <td>
                         <a href="{{url('/categoria/'.$categoria->id.'/edit')}}"class="btn btn-primary">
                             Editar
                         </a>
                     </td>
                 </tr>
                 @endforeach
        </tbody>
        </table>
        <div class="floating">
        <a href="{{url('/categoria/create')}}" class="btn btn-primary btn-fab">
            <i class="material-icons">add</i>
        </a>
        </div>
    </div>
    @endsection
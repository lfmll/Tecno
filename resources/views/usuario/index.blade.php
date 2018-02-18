@extends("layouts.app")
@section("content")
    <div class="big-padding text-center blue-grey white-text">
        <h1>Lista de Usuario</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Tipo</td>
            <!--<td>Opciones</td>-->
        </tr>
        </thead>
        <tbody>
             @foreach($usuarios as $usu)
                 <tr>
                     <td>{{$usu->id}}</td>
                     <td>{{$usu->name}}</td>
                     <td>{{$usu->email}}</td>
                     <td>{{$usu->tipo}}</td>
<!--                     <td>
                         <a href="{{url('/usuario/'.$usu->id.'/edit')}}"class="btn btn-primary">
                             Editar
                         </a>
                     </td>-->
                 </tr>
                 @endforeach
        </tbody>
        </table>
<!--        <div class="floating">
        <a href="{{url('/usuario/create')}}" class="btn btn-primary btn-fab">
            <i class="material-icons">add</i>
        </a>            
        </div>-->
    <a href="{{url('/home')}}" class="btn btn-primary">Ver Menu</a>    
    </div>
    
    @endsection

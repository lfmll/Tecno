@extends("layouts.app")
@section("content")

    <div class="big-padding text-center blue-grey white-text">
        <h1>Marcas</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Procedencia</td>
            </tr>
            </thead>
            <tbody>
            @foreach($marca as $mark)
                <tr>
                    <td>{{$mark->id}}</td>
                    <td>{{$mark->nombre}}</td>
                    <td>{{$mark->procedencia}}</td>
                    <td>
                        <a href="{{url('/marca/'.$mark->id.'/edit')}}"class="btn btn-primary">
                           Editar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div class="floating">
        <a href="{{url('/marca/create')}}" class="btn btn-primary btn-fab">
            <i class="material-icons">add</i>
        </a>
        </div>
@endsection	
@extends("layouts.app")
@section("content")
    <div class="big-padding text-center blue-grey white-text">
        <h1>Productos</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Codigo</td>                    
                    <td>Categoria</td>
                    <td>Marca</td>
                    <td>Stock</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($producto as $prod)
                    <tr>
                        <td>{{$prod->id}}</td>
                        <td>{{$prod->nombre}} </td>
                        <td>{{$prod->descripcion}} </td>
                        <td>{{$prod->codigo}}</td>                        
                        
                        <td>{{$prod->categoria->nombre}}</td>
                        
                            <td>{{$prod->marca->nombre}}</td>
                        
                        <td>{{$prod->stock}} </td>
                        <td>
                            <a href="{{url("/producto/$prod->id")}}"class="btn btn-primary">Ver</a>
                            <a href="{{url('/producto/'.$prod->id.'/edit')}}" class="btn btn-info">
                            Editar
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
        <div class="floating">
            <a href="{{url('/producto/create')}}" class="btn btn-primary btn-fab">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
                                
@endsection

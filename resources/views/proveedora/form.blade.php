{!! Form::open(['url' => $url, 'method' => $method]) !!}
<div class="form-group">
    {{Form::text('nombre',$proveedora->nombre,['class'=>'form-control','placeholder'=>'nombre'])}}
</div>

<div class="form-group">
    {{Form::text('telefono',$proveedora->telefono,['class'=>'form-control','placeholder'=>'telefono de la empresa proveedora'])}}
</div>
<div class="form-group">
    {{Form::text('direccion',$proveedora->direccion,['class'=>'form-control','placeholder'=>'direccion de la empresa proveedora'])}}
</div>
<div class="form-group text-right">
    <a href="{{url('/proveedora')}}"> Regresar al listado proveedor
    </a>
    <input type="submit" value="Enviar" class="btn btn-success">
</div>
{!! Form::close() !!}

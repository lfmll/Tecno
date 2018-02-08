{!! Form::open(['url' => $url, 'method' => $method]) !!}
<div class="form-group">
    {{Form::text('nombre',$marca->nombre,['class'=>'form-control','placeholder'=>'nombre'])}}
</div>

<div class="form-group">
    {{Form::text('procedencia',$marca->procedencia,['class'=>'form-control','placeholder'=>'pais de la marca'])}}    
</div>
<div class="form-group text-right">
    <a href="{{url('/marca')}}"> Regresar al listado marca
    </a>
    <input type="submit" value="Enviar" class="btn btn-sucess">
</div>
{!! Form::close() !!}
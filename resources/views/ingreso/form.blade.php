{!! Form::open(['url'=>$url, 'method'=>$method])!!}
<div class="form-group">
    {{Form::label('title','Fecha de Ingreso')}}   
    {{Form::text('fecha',$ingreso->fecha_ingreso,['class'=>'form-control','placeholder'=>'Fecha de Ingreso'])}}
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
        {{Form::label('title','Tipo de Comprobante')}}    
        <select name="tipo_comprobante" class="form-control">
            <option value="Recibo">Recibo</option>
            <option value="Factura">Factura</option>
        </select>
    </div>        
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
        {{Form::label('title','Numero de Comprobante')}}
        {{Form::text('num_comprobante',$ingreso->num_comprobante,['class'=>'form-control','placeholder'=>'Numero de Comprobante'])}}
    </div>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
        {{Form::label('title','Proveedor')}}
        {{Form::select('proveedora_id',$proveedoras,null,['class'=>'form-control','placeholder'=>'seleccione un Proveedor','required'])}}
    </div>
</div>
</div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    {{Form::label('title','Productos')}}
                    {{Form::select('producto_id',$productos,null,['class'=>'form-control','placeholder'=>'producto','required'])}}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
                <div class="form-group">
                    {{Form::label('title','Cantidad')}}
                    {{Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'Cantidad de Producto'])}}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
                <div class="form-group">
                    {{Form::label('title','Precio de Compra')}}
                    {{Form::text('precio_compra',null,['class'=>'form-control','placeholder'=>'Precio en bolivianos'])}}
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-2 col-xs-12">
                <div class="form-group">
                    <button type="button" id="btn_add" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel panel-body">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color: #2ab27b">
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Compra</th>
                    </thead>
                    <tfoot>
                        <th></th>                
                        <th></th>
                        <th></th>
                    </tfoot>
                    <tbody>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
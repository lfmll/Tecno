{!! Form::open(['url' => $url, 'method' => $method]) !!}
{{Form::token()}}
<div class="form-group">
    {{Form::label('title','Fecha de Ingreso')}}   
    <!--{{Form::text('fecha',$ingreso->fecha_ingreso,['class'=>'form-control',<?='date(dd-mm-yyyy)'?>])}}-->
    <input class="form-control" type="date" value="<?='dat(dd-mm-yyyy)'?>">
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
        {{Form::select('proveedora_id',$proveedoras,null,['class'=>'form-control','placeholder'=>'seleccione un Proveedor','required','id'=>'idproveedor'])}}
    </div>
</div>        
</div>
<!--Session de Detalle-->
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-3 col-md-3 col-xs-12">
                <div class="form-group">
                    {{Form::label('title','Producto')}}
                    {{Form::select('producto_id',$productos,null,['class'=>'form-control','placeholder'=>'seleccione un Producto','required','id'=>'producto_id'])}}
                    
                </div>
            
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                    <!--{{Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'Cantidad de Producto'])}}-->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Precio de Compra</label>
                    <input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="Precio de Compra">
                    <!--{{Form::text('precio_compra',null,['class'=>'form-control','placeholder'=>'Precio en bolivianos'])}}-->
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-2 col-xs-12">
                <div class="form-group">
                    <button type="button" id="btn_add" class="btn btn-primary">Agregar</button>
                    <input type="button" id="btn_prueba" class="btn btn-primary" onclick="fncargar();">
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
                        <th>Opciones</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Compra</th>
                        <th>SubTotal</th>
                    </thead>
                    <tfoot>
                        <th>Total</th>
                        <th></th>
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
<div id="guardar" class="col-log-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <input name="_token" value="{{ csrf_token() }}" type="hidden"></imput>
        <button class="btn btn-primary" type="submit">Guardar</button>        
    </div>
</div>
{!! Form::close() !!}
@push ('scripts')
<script>
    $(document).ready(function(){
        $('#btn_add').onClick(function(){
            alert("dfdfd");
           agregar(); 
        });
    });
    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();
    function agregar(){
        idproducto=$("#producto_id").val();
        producto=$("#producto_id option:selected").text();
        cantidad=$("#pcantidad").val();
        precio_compra=$("pprecio_compra").val();
        
        if (producto_id!="" && cantidad!="" && precio_compra!="") {
            subtotal[cont]=(cantidad*precio_compra);
            total=total+subtotal[cont];
            
            var fila='<tr class="selectd" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idproducto+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td>'+subtotal[cont]+'</td></tr>';
            limpiar();
            $("#total").html("S/. "+total);
            evaluar();
            $('#detalles').append(fila);
        }else{
            alert("Error al ingresar al detalle de ingreso");
        }       
    }
    function fncargar(){
        alert("hola estoy probando");
    }
    function limpiar(){
        $(#cantidad).val("");
        $(#precio_compra).val("");
    }
    
    function evaluar(){
        if (total>0) {
            $("#guardar").show();
        }else {
            $("#guardar").hide();
        }
    }
    
    function eliminar(index){
        total=total-subtotal[index];
        $("#total").html("S/. "+total);
        $("#fila"+ index).remove();
        evaluar();
    }
    
</script>
@endpush
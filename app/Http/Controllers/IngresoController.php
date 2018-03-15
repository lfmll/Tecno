<?php

namespace App\Http\Controllers;

use App\Ingreso;
use App\DetalleIngreso;
use App\Producto;
use App\Proveedora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingreso= Ingreso::all();
        return view("ingreso.index",["ingreso"=>$ingreso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedoras= Proveedora::orderBy('nombre','ASC')->pluck('nombre','id');
        $productos= Producto::orderBy('nombre','ASC')->pluck('nombre','id');        
        $ingreso=new Ingreso();
        return view("ingreso.create",["ingreso"=>$ingreso])
                ->with('proveedoras',$proveedoras)
                ->with('productos',$productos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $ingreso=new Ingreso($request->all());
            $ingreso->fecha_ingreso= Carbon::now('America/La_Paz')->toDateTimeString();
            $ingreso->tipo_comprobante=$request->tipo_comprobante;
            $ingreso->num_comprobante=$request->num_comprobante;        
            $ingreso->save();
            
            $cantidad=$request->get('cantidad');
            $precio_compra=$request->get('precio_compra');
            $idproducto=$request->get('producto_id');
            
            $cont=0;
            while ($cont<count($idproducto)){
                $detalle=new DetalleIngreso();
                $detalle->ingreso_id=$ingreso->id;
                $detalle->producto_id=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_compra=$precio_compra[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        } catch (\Exception $e){
            BD::rollback();
        }
        if ($ingreso->save()){
            return redirect("/ingreso");
        }else{
            return view("ingreso.create",["ingreso"=>$ingreso]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingreso= Ingreso::find($id);
        $proveedoras= Proveedora::orderBy('nombre','ASC')->pluck('nombre','id');
        return view("ingreso.edit",["ingreso"=>$ingreso])->with('proveedoras',$proveedoras);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingreso= Ingreso::find($id);
        $ingreso->fecha_ingreso=$request->fecha_ingreso;
        $ingreso->tipo_comprobante=$request->tipo_comprobante;
        $ingreso->num_comprobante=$request->num_comprobante;
        if ($ingreso->save()){
            return redirect("/ingreso");
        } else {
            return view("ingreso.edit",["ingreso"=>$ingreso]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

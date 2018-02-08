<?php

namespace App\Http\Controllers;

use App\Proveedora;
use Illuminate\Http\Request;

class ProveedoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedora= Proveedora::all();
        return view("proveedora.index",["proveedora"=>$proveedora]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedora=new Proveedora();
        return view("proveedora.create",["proveedora"=>$proveedora]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedora=new Proveedora;
        $proveedora->nombre=$request->nombre;
        $proveedora->telefono=$request->telefono;
        $proveedora->direccion=$request->direccion;
        if ($proveedora->save()){
            return redirect("/proveedora");
        }else{
            return view("proveedora.create",["proveedora"=>$proveedora]);
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
        $proveedora=Proveedora::find($id);
        return view("proveedora.edit",["proveedora"=>$proveedora]);
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
        $proveedora= Proveedora::find($id);
        $proveedora->nombre=$request->nombre;
        $proveedora->telefono=$request->telefono;
        $proveedora->direccion=$request->direccion;
        if ($proveedor->save()){
            return redirect("/proveedora");
        }else{
            return view("proveedora.create",["proveedora"=>$proveedora]);
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

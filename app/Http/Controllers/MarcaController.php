<?php

namespace App\Http\Controllers;
use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca=Marca::all();
        return view("marca.index",["marca"=>$marca]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca=new Marca();
        return view("marca.create",["marca"=>$marca]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca=new Marca;
        $marca->nombre=$request->nombre;
        $marca->procedencia=$request->procedencia;
        if ($marca->save()){
            return redirect("/marca");
        } else {
            return view("marca.edit",["marca"=>$marca]);
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
        $marca=Marca::find($id);
        return view("marca.edit",["marca"=>$marca]);
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
        $marca= Marca::find($id);
        $marca->nombre=$request->nombre;
        $marca->procedencia=$request->procedencia;
        if ($marca->save()){
            return redirect("/marca");
        }else{
            return view("marca.edit",["marca"=>$marca]);
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

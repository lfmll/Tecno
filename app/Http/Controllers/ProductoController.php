<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Marca;
use App\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $prod= Producto::all();
        return view("producto.index",["producto"=>$prod]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        $marcas=Marca::orderBy('nombre','ASC')->pluck('nombre','id');
        $product=new Producto();
        return view("producto.create",["product"=>$product])->with('categorias',$categorias)->with('marcas',$marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasFile=$request->hasFile('cover') && $request->cover->isValid();
        $product=new Producto($request->all());
        $product->nombre=$request->nombre;
        
        $product->descripcion=$request->descripcion;
        
        $product->codigo=$request->codigo;       
        $product->stock=0;
        if($hasFile){
            $extension=$request->cover->extension();
            $product->extension=$extension;
        }
        $product->estado="habilitado";
        if($product->save()){
            if($hasFile){
                $request->cover->move('images',"$product->id.$extension");
            }
            return redirect("/producto");
        }else{
            return view("producto.create",["product"=>$product]);
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
        $product= Producto::find($id);
        return view('producto.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Producto::find($id);
        
        $categorias=Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        $marcas=Marca::orderBy('nombre','ASC')->pluck('nombre','id');

        return view("producto.edit",["product"=>$product])
            ->with('categorias',$categorias)
            ->with('marcas',$marcas);
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
        $product=Producto::find($id);

        $hasFile=$request->hasFile('cover')&& $request->cover->isValid();

        $product->nombre=$request->nombre;        
        $product->descripcion=$request->descripcion;
        $product->codigo=$request->codigo;

        if($hasFile){
            $extension=$request->cover->extension();
            $product->extension=$extension;
        }

        $product->fill($request->all());
        if($product->save()){

            if($hasFile){
                $request->cover->move('images',"$product->id.$extension");
            }

            return redirect("/producto");
        }else{
            return view("producto.edit",["product"=>$product]);
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
        $producto= Producto::findOrFail($id);
        $producto->estado='inactivo';
        $producto->update();
        return redirect('/producto');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\busquedapro;
use App\Models\esta;
use DB;
use Illuminate\Http\Request;


class BusquedaproController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = DB::table('marca')
            ->join('producto', 'producto.idMarca', '=', 'marca.idMarca')
            ->join('categoria', 'producto.idCategoria', '=', 'categoria.idCategoria')
            ->join('estanteria', 'producto.idEstanteria', '=', 'estanteria.idEstanteria')
            ->select(
                'producto.idProducto as idproducto', 
                'marca.idmarca', 'marca.nombre as marca',    
                'categoria.idCategoria', 'categoria.nombre as categoria',
                'estanteria.idEStanteria', 'estanteria.nombre as estanteria',
                'producto.nombre as nombre',
                'producto.imagen as imagen',
                'producto.precio as precio',
                'producto.unidadmedida as unidadmedida',
                'producto.cantidadmedida as cantidadmedida',
                'producto.descripcion as descripcion', 
                'producto.stock as stock', 
                'producto.caracteristicas as caracteristicas',
                'producto.especificaciones as especificaciones'
            )
            ->orderBy('idproducto', 'ASC')
            ->get();
    
        return view('prueba/index', ['producto' => $producto]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(busquedapro $busquedapro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = busquedapro::findOrFail($id);
        $estanterias = Esta::orderBy('nombre')->get();
        return view('prueba.edit', compact('producto','estanterias'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
  

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(busquedapro $busquedapro)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view("agregarproducto");
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
         // Validación de los datos
         $validatedData = $request->validate([
            'marca' => 'required',
            'categoria' => 'required',
            'estanteria' => 'required',
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'unidadm' => 'required',
            'medida' => 'required|numeric',
            'descripcion' => 'required',
            'stock' => 'required|numeric',
            'caracteristicas' => 'required',
            'especificaciones' => 'required',
        ]);
        Productos::create($validatedData);

        return redirect()->route('index'); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\busquedapro;
use App\Models\categoria;
use App\Models\marca;
use App\Models\esta;
use Illuminate\Http\Request;



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
        // Desplegables
        $estanterias = Esta::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();

        return view('agregarproducto', compact('marcas', 'categorias', 'estanterias'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'categoria' => 'required',
            'nombre' => 'required',
            'estanteria' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'precio' => 'required',
            'unidadm' => 'nullable',
            'medida' => 'nullable', 
            'descripcion' => 'required',
            'stock' => 'required',
            'caracteristicas' => 'required',
            'especificaciones' => 'required',
            'idper' => 'required',
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombre_imagen = time() . '.' . $imagen->getClientOriginalExtension();
            $ruta = public_path('imagenes/productos/' . $nombre_imagen);

            // Guarda la imagen en la carpeta deseada
            $imagen->move(public_path('imagenes/productos'), $nombre_imagen);

            $producto = busquedapro::create([
                'idmarca' => $request->input('marca'),
                'idcategoria' => $request->input('categoria'),
                'idpersona' => $request->input('idper'),
                'idestanteria' => $request->input('estanteria'),
                'nombre' => $request->input('nombre'),
                'imagen' => 'imagenes/productos/' . $nombre_imagen,
                'precio' => $request->input('precio'),
                'unidadmedida' => $request->input('unidadm'),
                'cantidadmedida' => $request->input('medida'),
                'descripcion' => $request->input('descripcion'),
                'stock' => $request->input('stock'),
                'caracteristicas' => $request->input('caracteristicas'),
                'especificaciones' => $request->input('especificaciones'),
            ]);
        }

        return redirect()->back();
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
;
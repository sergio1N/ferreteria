<?php

namespace App\Http\Controllers;
use App\Models\marca;
use Illuminate\Http\Request;


class marcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::where('visible', '=', 1)->orderBy('nombre','ASC')->paginate(5);
        return view('marca.index', compact('marcas'));
    }
    
    
    public function toggleVisibility(Request $request, $idmarca)
    {
        $marca = Marca::find($idmarca);
        if ($marca) {
            $marca->visible = !$marca->visible;
            $marca->save();
        }
    
        // Redirige de vuelta a la vista de marcas
        return redirect()->route('marca.index');
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
        $request->validate([
            'marcanom' => 'required',
        ]);
    
        $marca = marca::create([
            'nombre' => $request->input('marcanom'),
        ]);

        return redirect()->back()->with('success', 'Marca creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($idmarca)
    {
        $marca = Marca::find($idmarca);
        if ($marca) {
            $marca->visible = 1; // Establecer como visible
            $marca->save();
        }
    
        // Redirige de vuelta a la vista de marcas
        return redirect()->route('marca.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idmarca)
    {
        $marca = Marca::find($idmarca);
    
        return view('marca.edit', compact('marca'));
    }
    
    public function hide($idmarca)
    {
        $marca = Marca::find($idmarca);
    
        // Cambia el valor de 'visible' a 0 para ocultar la marca
        $marca->visible = 0;
        $marca->save();
    
        return redirect()->route('marca.index')->with('success', 'Marca ocultada correctamente.');
    }
    // colocar las marcas bisibles
    public function marcasOcultas()
{
    $marcasOcultas = Marca::where('visible', 0)->orderBy('nombre','ASC')->get();
    return view('marca.ocultas', compact('marcasOcultas'));
}
    
    

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idmarca)
    {
        try {
            // Validación de datos (puedes agregar más validaciones según sea necesario)
            $request->validate([
                'txtnombre' => 'required|string|max:255',
            ]);

            // Encuentra la marca por ID
            $marca = Marca::findOrFail($idmarca);

            // Actualiza los campos
            $marca->nombre = $request->input('txtnombre');
            // Agrega más campos si es necesario

            // Guarda los cambios
            $marca->save();

            return back()->with('correcto', 'Marca actualizada correctamente');
        } catch (\Throwable $th) {
            return back()->with('incorrecto', 'Error al actualizar la marca');
        }
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

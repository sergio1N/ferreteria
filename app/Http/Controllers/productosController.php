<?php

namespace App\Http\Controllers;

use App\Models\busquedapro;
use App\Models\categoria;
use App\Models\marca;
use App\Models\esta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;




class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */



     //admin
     public function createadmin(){
        return view('roles/admin/productosadmin');
     }
    public function mostrarProductos()
    {
        $productos = Producto::with('marca')->take(6)->get();
        return view('principal', compact('productos'));
    }
    public function mostrarfiltro()
    {
        $marcas = marca::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        $product = Producto::get();
        return view('roles/usuario/profiltro', compact('product', 'categorias', 'marcas'));
    }

    public function buscar(Request $request)
    {
        // Recibir los filtros desde el formulario
        $categoria = $request->input('categorias');
        $marca = $request->input('marcas');
        $precio = $request->input('precio');

        // Consulta inicial de productos (sin filtrar)
        $query = Producto::query();

        // Aplicar filtros si se seleccionaron opciones válidas
        if ($categoria !== 'Todos') {
            $query->where('idcategoria', $categoria);
        }

        if ($marca !== 'Todos') {
            $query->whereHas('marca', function ($query) use ($marca) {
                $query->where('nombre', $marca);
            });
        }

        if ($precio === 'asc') {
            $query->orderBy('precio', 'asc');
        } elseif ($precio === 'desc') {
            $query->orderBy('precio', 'desc');
        }

        // Obtener los resultados de la búsqueda
        $resultados = $query->get();

        // Retornar los resultados como JSON
        return response()->json($resultados);
    }


    public function index()
    {
        return view('iniciologin');
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

        return redirect()->back()->with('success', 'Producto Creado con éxito');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id); // Obtener el producto por su ID

        // Obtener la categoría del producto actual
        $categoriaProductoActual = $producto->idcategoria;

        // Obtener productos de la misma categoría excluyendo el producto actual
        $productosRelacionados = Producto::where('idproducto', '!=', $producto->idproducto)
            ->where('idcategoria', $categoriaProductoActual)
            ->get();

        return view('roles/usuario/productos', compact('producto', 'productosRelacionados'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $producto = busquedapro::findOrfail($id);
        return view('prueba/edit', ['producto' => $producto]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $producto = busquedapro::find($id);

        if (!$producto) {

            return redirect()->route('busquedapro.index')->with('error', 'Producto no encontrado');
        }

        // Actualizar los campos del producto con los datos del formulario
        $producto->nombre = $request->input('nombre');
        $producto->idestanteria = $request->estanteria;
        $producto->precio = $request->input('precio');
        $producto->unidadmedida = $request->input('unidadmedida');
        $producto->cantidadmedida = $request->input('cantidadmedida');
        $producto->save();

        // Redirigir a alguna vista de éxito o a donde desees
        return redirect()->route('busquedapro.index')->with('success', 'Producto actualizado con éxito');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}


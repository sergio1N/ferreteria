<?php

namespace App\Http\Controllers;

use App\Models\busquedapro;
use App\Models\esta;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\DetalleFactura;
use Illuminate\Support\Facades\View;
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

    // En BusquedaproController
public function mostrarInformeGeneral()
{
    $productos = busquedapro::all();

    return view('prueba.informe_general', compact('productos'));
}


    public function mostrarInforme($id)
{
    $producto = busquedapro::findOrFail($id);
    $detalles = detalleFactura::where('idproducto', $id)->get();

    return view('prueba.informe', compact('producto', 'detalles'));
}



public function generarInformePDF()
{
    // Obtén todos los productos con sus detalles de factura
    $productos = Busquedapro::with('detallesFactura')->get();

    // Array para almacenar los datos del informe
    $informe = [];

    // Variable para almacenar la suma total de ventas
    $totalVentas = 0;

    // Itera sobre cada producto para obtener la información requerida
    foreach ($productos as $producto) {
        $nombre = $producto->nombre;
        $cantidadStock = $producto->stock;

        // Obtén la cantidad vendida en las últimas 24 horas usando la relación
        $cantidadVendida = $producto->detallesFactura
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->sum('cantidad');

        // Calcula el valor total de esas ventas
        $valorTotalVentas = $cantidadVendida * $producto->precio;

        // Almacena los datos en el array del informe
        $informe[] = [
            'nombre' => $nombre,
            'cantidadStock' => $cantidadStock,
            'cantidadVendida' => $cantidadVendida,
            'valorTotalVentas' => $valorTotalVentas,
        ];

        // Agrega el valor total de ventas al total general
        $totalVentas += $valorTotalVentas;
    }

    // Comparte los datos con la vista de informe en PDF
    $data = [
        'informe' => $informe,
        'totalVentas' => $totalVentas,
    ];

    $pdf = PDF::loadView('prueba.informe_pdf', $data);

    // Descarga el archivo PDF
    return $pdf->stream();
}

}

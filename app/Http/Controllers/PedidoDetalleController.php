<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\producto;
use App\Models\detallePedido;
use App\Models\Proveedor;
use App\Http\Controllers\Log;

class PedidoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('created_at', 'desc')->paginate(10);
        return view('pedido.index', compact('pedidos'));
    }
    public function pedidosSinDetalles()
    {
        $pedidosSinDetalles = Pedido::doesntHave('detalles')->get();
        return view('pedidos.sin_detalles', compact('pedidosSinDetalles'));
    }
    /**
     * Display a listing of pending orders.
     */
    public function pendientes()
    {
        $pedidosPendientes = Pedido::with('proveedor')
            ->doesntHave('detalles')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pedidos/pendientes', compact('pedidosPendientes'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtén información necesaria para el formulario, por ejemplo, pedidos disponibles
        $pedidos = Pedido::all();

        return view('detallepedido.create', compact('pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show($idPedido)
    {
        $pedido = Pedido::with('detalles')->find($idPedido);
        return view('pedidos.detalle', compact('pedido'));
    }
    public function store(Request $request)
    {
        // Valida la solicitud
        $request->validate([
            'idpedido' => 'required|exists:pedidos,id',
            'idproducto' => 'required|exists:productos,idproducto',
            // Otros campos de validación...
        ]);

        // Crea un nuevo detalle de pedido
        $detalle = DetallePedido::create($request->all());

        // Actualiza el stock del producto
        $producto = Producto::find($request->idproducto);

        // Verifica si el producto se encuentra
        if ($producto) {
            $producto->stock += $request->cantidad;
            $producto->save();

            // Suma el stock del DetallePedido al stock del Producto
            $producto->stock += $detalle->stock; // Asumo que hay un campo 'stock' en DetallePedido
            $producto->save();

            // Registros de depuración
            Log::info("Stock actualizado para producto {$producto->idproducto}. Nuevo stock: {$producto->stock}");
        } else {
            // Registros de depuración si el producto no se encuentra
            Log::error("No se encontró el producto con ID {$request->idproducto} al actualizar el stock.");
        }

        // Puedes redirigir a donde desees después de almacenar el detalle del pedido
        return response()->json(['mensaje' => 'Detalle del pedido guardado con éxito']);
    }

    

    public function guardarDetallePedido(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'detalles' => 'required|array',
            'detalles.*.idproducto' => 'required|exists:productos,idproducto',
            'detalles.*.cantidad' => 'required|numeric|min:1',
            // Otras reglas de validación según tus requisitos
        ]);
    
        try {
            // Iniciar una transacción para asegurar la consistencia de la base de datos
            \DB::beginTransaction();
    
            foreach ($request->input('detalles') as $detalle) {
                // Crear un nuevo detalle de pedido
                DetallePedido::create([
                    'idpedido' => $request->input('idpedido'), // Asegúrate de tener este campo disponible en tu formulario
                    'idproducto' => $detalle['idproducto'],
                    'cantidad' => $detalle['cantidad'],
                    // Otros campos del detalle del pedido
                ]);
    
                // Actualizar el stock del producto
                $producto = Producto::find($detalle['idproducto']);
    
                if ($producto) {
                    $producto->stock -= $detalle['cantidad'];
                    $producto->save();
                }
            }
    
            // Confirmar la transacción
            \DB::commit();
    
            // Devolver una respuesta JSON
            return response()->json(['mensaje' => 'Detalle de pedido guardado correctamente']);
        } catch (\Exception $e) {
            // Deshacer la transacción en caso de error
            \DB::rollback();
    
            // Devolver una respuesta JSON con el mensaje de error
            return response()->json(['error' => 'Error al guardar el detalle del pedido'], 500);
        }
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


    
    public function detallePedidosPorProveedor($idProveedor)
    {
        $proveedor = Proveedor::findOrFail($idProveedor);
    
        // Obtén los pedidos del proveedor con detalles
        $pedidos = Pedido::with('detalles')->where('idproveedor', $idProveedor)->get();
    
        // Asegúrate de imprimir o hacer un dd para verificar si $pedidos tiene datos
        dd($proveedor, $pedidos);
    
        // return view('pedido.detalle', compact('proveedor', 'pedidos'));
    }
    
    }



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\detallePedido;

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
            'idpedido' => 'required|exists:pedido,id',
            'idproducto' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'valortotal' => 'required|numeric',
        ]);

        // Crea un nuevo detalle de pedido
        DetallePedido::create($request->all());

        // Puedes redirigir a donde desees después de almacenar el detalle del pedido
        return redirect()->route('detallepedido.create')->with('success', 'Detalle de pedido creado correctamente');
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

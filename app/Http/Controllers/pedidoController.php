<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\pedido;




class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedido = DB::table('pedido')
            ->join('proveedor', 'pedido.idproveedor', '=', 'proveedor.idproveedor')
            ->select(
                'pedido.idpedido as idpedido',
                'proveedor.idproveedor',
                'proveedor.nombre as proveedor',
                'pedido.fotofactura as foto'
            )
            ->orderBy('idpedido', 'ASC')
            ->get();

        return view('pedido/index', ['pedido' => $pedido]);
    }

    public function pedi()
    {
        // Obtén los pedidos pendientes desde la base de datos
        //$pedidosPendientes = DB::table('pedidos')->where('estado', 'pendiente')->get();

        //return view('pedido.pendientes');

        return view('hola');
    }
    public function verificarPedido(Request $request, $idPedido)
    {
        // Realiza la verificación y actualiza el estado del pedido
        DB::table('pedidos')->where('idpedido', $idPedido)->update(['estado' => 'verificado']);

        return redirect()->route('pedido.pendientes')->with('success', 'Pedido verificado correctamente');
    }

    /**
     * Show the form for creating a new resource.
     */
    // PedidoController.php
    public function create()
    {

        return view('pedido.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'producto' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'valortotal' => 'required|numeric',
        ]);

        // Crea un nuevo pedido con los datos del formulario
        Pedido::create([
            'producto' => $request->producto,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'valortotal' => $request->valortotal,
            // Agrega más campos según sea necesario
        ]);

        // Redirecciona a donde sea apropiado después de almacenar el pedido
        return redirect()->route('pedido.proveedor')->with('success', 'Pedido creado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = DB::table('proveedor')->where('nombre', $id)->first();

        if (!$proveedor) {
            return abort(404);
        }

        $pedidos = DB::table('pedido')
            ->join('proveedor', 'pedido.idproveedor', '=', 'proveedor.idproveedor')
            ->select(
                'pedido.idpedido as idpedido',
                'proveedor.idproveedor',
                'proveedor.nombre as proveedor',
                'pedido.fotofactura as foto'
            )
            ->where('proveedor.idproveedor', $proveedor->idproveedor)
            ->orderBy('idpedido', 'ASC')
            ->get();

        return view('pedido.index', ['pedido' => $pedidos, 'proveedor' => $proveedor]);
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

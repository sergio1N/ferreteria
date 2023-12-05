<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detallePedido;
use App\Models\pedido;
use App\Models\busquedapro;
use DB;

class detallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarDetalles($id)
    {
        $pedido = DB::table('detallePedido')
        ->join('producto', 'detallePedido.idproducto', '=', 'producto.idproducto')
        ->join('pedido', 'detallePedido.idpedido', '=', 'pedido.idpedido')
        ->select(
            'detallePedido.iddetallepedido as iddetallepedido',
            'producto.idproducto', 'producto.nombre as producto',
            'pedido.idpedido', 'pedido.fotofactura as foto', 
            'detallePedido.descripcion as descripcion',
            'detallePedido.precio as precio',
            'detallePedido.cantidad as cantidad',
            'detallePedido.valortotal as valortotal'
        )
        
        ->where('detallePedido.iddetallepedido', $id)
        ->get();
    
    return view('pedido.detalle', ['pedido' => $pedido]);
    
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

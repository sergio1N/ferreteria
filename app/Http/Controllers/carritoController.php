<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Models\carrito;
use App\Models\Producto;
use App\Models\User;


use Illuminate\Http\Request;

class carritoController extends Controller {
    public function index() {
        $idUsuario = auth()->id();

        // Obtener los elementos del carrito del usuario actual
        $productosEnCarrito = Carrito::where('id', $idUsuario)->get();

        // Obtener los IDs de los productos en el carrito
        $idsProductos = $productosEnCarrito->pluck('idproducto')->toArray();

        // Obtener los detalles de los productos en el carrito
        $productos = Producto::whereIn('idproducto', $idsProductos)->get();

        return view('roles/usuario/carrito', compact('productosEnCarrito', 'productos'));
    }
    public function comprarProducto($id)
    {
        $carrito = Carrito::find($id);
        if ($carrito) {
            $carrito->delete();
            return redirect()->back()->with('success', 'Compra realizada');
        } else {
            return redirect()->back()->with('error', 'No se pudo eliminar el producto del carrito');
        }
    }

    public function create() {

    }

    public function store(Request $request) {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'id_producto' => 'required|exists:producto,idproducto',
            'cantidad' => 'required|numeric|min:1',
        ]);

        // Crear una nueva entrada en el carrito
        Carrito::create([
            'id' => $request->user_id,
            'idproducto' => $request->id_producto,
            'cantidad' => $request->cantidad,
        ]);
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }


    public function cantidadProductosEnCarrito() {
        $cantidad = Carrito::where('id', auth()->id())->count();
        return response()->json(['cantidad' => $cantidad]);
    }

    public function eliminarProducto($idcarrito) {
        try {
            $sql = DB::delete("DELETE FROM carrito WHERE idcarrito = ?", [$idcarrito]);
    
            if ($sql) {
                return back()->with("correcto", "Producto eliminado satisfactoriamente");
            } else {
                return back()->with("incorrecto", "No se encontró el producto en el carrito");
            }
        } catch (Throwable $th) {
            return back()->with("error", "Error al eliminar el producto del carrito: " . $th->getMessage());
        }
    }
    
    
    


    public function show(string $id) {
        //
    }

    public function edit(string $id) {
        //
    }

    public function update(Request $request, string $id) {
        //
    }

    public function destroy(string $id) {
        //
    }
}

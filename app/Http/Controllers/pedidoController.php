<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido; 
use App\Models\Proveedor;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //admin
     public function pedidoadmin(){
        return view('roles/admin/pedidoadmin');
     }
    public function index()
    {
        // Utiliza paginate() para obtener una cantidad específica de pedidos por página
        $pedidos = Pedido::orderBy('created_at', 'desc')->paginate(10); // Cambia el número 10 según tus necesidades
        return view('pedido.index', compact('pedidos'));
    }
    public function pendientes()
    {
        $pedidosPendientes = Pedido::with('proveedor')
            ->doesntHave('detalles')
            ->latest()
            ->paginate(10);

        return view('pedidos.pendientes', compact('pedidosPendientes'));
    }

    public function verificarPedido(Request $request, $idPedido)
    {
        // Tu lógica aquí
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'idproveedor' => 'required|exists:proveedor,idproveedor',
                'fotoFactura' => 'required|mimes:jpg,png,pdf,doc,docx',
            ]);
            if ($request->hasFile('fotoFactura')) {
                $archivo = $request->file('fotoFactura');
                $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
                Storage::disk('pedido')->putFileAs('imagenes/pedido/', $archivo, $nombreArchivo);
                Pedido::create([
                    'idproveedor' => $request->idproveedor,
                    'fotofactura' => 'imagenes/pedido/' . $nombreArchivo,
                ]);
                return redirect()->route('pedidos.index')->with(['success' => 'Pedido agregado correctamente', 'nombreArchivo' => $nombreArchivo]);
            } else {
                return redirect()->back()->with('error', 'No se proporcionó un archivo válido');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al agregar el pedido: ' . $e->getMessage());
        }
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $detalles = $pedido->detalles(); // Asume que hay una relación entre Pedido y DetallePedido
    
        return view('pedido.show', compact('pedido', 'detalles'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tu lógica aquí
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Tu lógica aquí
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tu lógica aquí
    }

    public function mostrarProveedores()
    {
        $proveedores = Proveedor::all();
        return view('pedido.proveedores', compact('proveedores'));
    }

    public function pedidosPorProveedor($idProveedor)
    {
        $proveedor = Proveedor::find($idProveedor);
        $pedidos = Pedido::where('idproveedor', $idProveedor)->get();
        return view('pedido.pedido', compact('proveedor', 'pedidos'));
    }
    public function pedidosLlegados()
{
    $pedidosLlegados = Pedido::where('llegado', true)->paginate(5);
    return view('pedidos.llegados', compact('pedidosLlegados'));
}
}

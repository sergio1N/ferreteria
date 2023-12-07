<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Proveedor;
use App\Models\producto;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller {
    /**
     * Display a listing of the resource.
     */

    //admin
    public function pedidoadmin() {
        return view('roles/admin/pedidoadmin');
    }
    // En tu controlador PedidoController
        public function index() {
            $pedidos = Pedido::where('admitido', false)
                            ->orderBy('fechahora', 'desc')
                            ->paginate(10); // Número de elementos por página
        
            return view('pedido.index', compact('pedidos'));
        }
    

        public function admitirForm($idPedido) {
            $pedido = Pedido::findOrFail($idPedido);
            $productos = Producto::all();
        
            return view('pedido.admitir', compact('pedido', 'productos'));
        }
        
    public function admitirPedido(Request $request, $idPedido) {
        // Validación y lógica para admitir el pedido aquí
    
        // Actualizar el estado admitido del pedido
        Pedido::where('idpedido', $idPedido)->update(['admitido' => true]);
    
        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->route('pedidos.pendientes')->with('success', 'Pedido admitido correctamente');
    }

    public function pendientes() {
        $pedidosPendientes = Pedido::with('proveedor')
            ->doesntHave('detalles')
            ->latest()
            ->paginate(10);

        return view('pedidos.pendientes', compact('pedidosPendientes'));
    }

    public function verificarPedido(Request $request, $idPedido) {
        // Tu lógica aquí
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            $request->validate([
                'idproveedor' => 'required|exists:proveedor,idproveedor',
                'fotoFactura' => 'required|mimes:jpg,png,pdf,doc,docx',
            ]);
            if($request->hasFile('fotoFactura')) {
                $archivo = $request->file('fotoFactura');
                $nombreArchivo = time().'_'.$archivo->getClientOriginalName();
                Storage::disk('pedido')->putFileAs('imagenes/pedido/', $archivo, $nombreArchivo);
                Pedido::create([
                    'idproveedor' => $request->idproveedor,
                    'fotofactura' => 'imagenes/pedido/'.$nombreArchivo,
                ]);
                return redirect()->route('pedidos.index')->with(['success' => 'Pedido agregado correctamente', 'nombreArchivo' => $nombreArchivo]);
            } else {
                return redirect()->back()->with('error', 'No se proporcionó un archivo válido');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al agregar el pedido: '.$e->getMessage());
        }
    }




    /**
     * Display the specified resource.
     */
    public function show($id) {
        $pedido = Pedido::with('proveedor')->findOrFail($id);
        $detalles = $pedido->detalles();
        $proveedor = $pedido->proveedor; 
        $productos = Producto::all();
    
        return view('pedido.detalle', compact('pedido', 'detalles', 'proveedor', 'productos'));
    }
    
    
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        // Tu lógica aquí
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        // Tu lógica aquí
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        // Tu lógica aquí
    }

    public function mostrarProveedores() {
        $proveedores = Proveedor::all();
        return view('pedido.proveedores', compact('proveedores'));
    }
    public function pedidosLlegados() {
        $pedidosLlegados = Pedido::where('llegado', true)->paginate(5);
        return view('pedidos.llegados', compact('pedidosLlegados'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\proveedor;
use App\Models\ciudad;
use App\Models\departamento;
use DB;
use Illuminate\Http\Request;

class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $proveedor = DB::table('departamento')
             ->join('proveedor', 'proveedor.iddepartamento', '=', 'departamento.iddepartamento')
             ->join('ciudad', 'proveedor.idciudad', '=', 'ciudad.idciudad')
             ->select(
                 'proveedor.idproveedor as idproveedor', 
                 'departamento.iddepartamento', 'departamento.nombre as departamento',    
                 'ciudad.idciudad', 'ciudad.nombre as ciudad', 
                 'proveedor.nombre as nombre',
                 'proveedor.telefono as telefono',
                 'proveedor.direccion as direccion',
                 'proveedor.nit as nit',
                 'proveedor.correo as correo',
             )
             ->where('proveedor.visible', true) // Filtra solo proveedores visibles
             ->orderBy('idproveedor', 'ASC')
             ->paginate(5);
     
         $departamento = departamento::orderBy('nombre')->get();
         $ciudad = ciudad::orderBy('nombre')->get();
     
         return view('proveedor.index', compact('proveedor', 'departamento', 'ciudad'));
     }
     public function nombre()
     {
         $proveedor = DB::table('departamento')
             ->join('proveedor', 'proveedor.iddepartamento', '=', 'departamento.iddepartamento')
             ->join('ciudad', 'proveedor.idciudad', '=', 'ciudad.idciudad')
             ->select(
                 'proveedor.idproveedor as idproveedor', 
                 'departamento.iddepartamento', 'departamento.nombre as departamento',    
                 'ciudad.idciudad', 'ciudad.nombre as ciudad', 
                 'proveedor.nombre as nombre',
                 'proveedor.telefono as telefono',
                 'proveedor.direccion as direccion',
                 'proveedor.nit as nit',
                 'proveedor.correo as correo',
             )
             ->where('proveedor.visible', true) // Filtra solo proveedores visibles
             ->orderBy('idproveedor', 'ASC')
             ->paginate(5);
     
         $departamento = departamento::orderBy('nombre')->get();
         $ciudad = ciudad::orderBy('nombre')->get();
     
         return view('pedido.proveedores', compact('proveedor', 'departamento', 'ciudad'));
     }
     
     public function hide($idproveedor)
    {
        $proveedor = proveedor::findOrFail($idproveedor);
        $proveedor->visible = false; // Oculta el proveedor
        $proveedor->save();
    
        return redirect()->route('proveedor.index')->with('success', 'Proveedor ocultado exitosamente');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamento = departamento::orderBy('nombre')->get();
        $ciudad = ciudad::orderBy('nombre')->get();
        $proveedor = null; // o $proveedor = []; dependiendo de tus necesidades
        return view('proveedor.create', compact('proveedor', 'departamento', 'ciudad'));
    }
    //desabilitar porveedores 

    
    
//proveedores ocultos 
public function showHidden($idproveedor)
{
    $proveedorOculto = proveedor::findOrFail($idproveedor);
    $proveedorOculto->visible = !$proveedorOculto->visible; // Cambia el estado (mostrar/ocultar)
    $proveedorOculto->save();

    return redirect()->route('proveedores-ocultos')->with('success', 'Proveedor habilitado exitosamente');
}


    
    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'iddepartamento' => 'required',
            'idciudad' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
            'correo' => 'required|email', 
        ]);
        

        // Ajusta el nombre del modelo a 'Proveedor'
        $proveedor = proveedor::create([
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'nit' => $request->input('nit'),
            'correo' => $request->input('correo'),
            'iddepartamento' => $request->input('iddepartamento'),
            'idciudad' => $request->input('idciudad'),
        ]);

        return redirect()->route('proveedor.index')->with('success', 'Proveedor creado exitosamente');

    }
    public function showHiddenIndex()
    {
        $proveedorOcultos = DB::table('departamento')
            ->join('proveedor', 'proveedor.iddepartamento', '=', 'departamento.iddepartamento')
            ->join('ciudad', 'proveedor.idciudad', '=', 'ciudad.idciudad')
            ->select(
                'proveedor.idproveedor as idproveedor',
                'departamento.iddepartamento',
                'departamento.nombre as departamento',
                'ciudad.idciudad',
                'ciudad.nombre as ciudad',
                'proveedor.nombre as nombre',
                'proveedor.telefono as telefono',
                'proveedor.direccion as direccion',
                'proveedor.nit as nit',
                'proveedor.correo as correo'
            )
            ->where('proveedor.visible', false)
            // Filtra solo proveedores visibles
            ->orderBy('idproveedor', 'ASC')
            ->paginate(5);
    
        $departamento = departamento::orderBy('nombre')->get();
        $ciudad = ciudad::orderBy('nombre')->get();
    
        return view('proveedor.ocultos', compact('proveedorOcultos', 'departamento', 'ciudad'));
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

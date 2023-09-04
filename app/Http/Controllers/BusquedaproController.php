<?php

namespace App\Http\Controllers;

use App\Models\busquedapro;
use App\Models\esta;
use Illuminate\Http\Request;


class BusquedaproController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $producto=busquedapro::orderBy('nombre','ASC')->paginate(5);
        return view('prueba/index',['producto'=>$producto]);
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
    public function update(Request $request, busquedapro $busquedapro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(busquedapro $busquedapro)
    {
        //
    }
}

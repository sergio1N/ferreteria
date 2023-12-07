@extends('roles.admin.homeAdmin')
@section('adminContenido')
<link rel="stylesheet" href="{{ asset('css/detallepedi.css') }}">
<br>
<br>
<br>
<br>
<br>
<br>
<h1>Detalles de Pedidos - {{ $proveedor->nombre }}</h1>

@if($pedido->detalles->isEmpty())
    <p>No se han hecho detalles para este pedido.</p>
@else
    <h2>Detalles del Pedido</h2>
    <table>
        <thead>
            <tr>
                <th>ID Detalle</th>
                <th>Descripción</th>
                <!-- Agrega más encabezados según sea necesario -->
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->detalles as $detalle)
                <tr>
                    <td>
                        <input type="text" value="{{ $detalle->iddetallepedido }}" readonly>
                    </td>
                    <td>
                        <input type="text" value="{{ $detalle->descripcion }}" readonly>
                    </td>
                    <!-- Agrega más celdas según sea necesario -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection

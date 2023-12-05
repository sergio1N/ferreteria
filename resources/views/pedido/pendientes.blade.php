@extends('layouts.base')

@section('contenido')
    <h1>Pedidos Pendientes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Proveedor</th>
                <th>Fecha de Pedido</th>
                <!-- Otros campos según tus necesidades -->
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidosPendientes as $pedido)
                <tr>
                    <td>{{ $pedido->idpedido }}</td>
                    <td>{{ $pedido->proveedor }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <!-- Otros campos según tus necesidades -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

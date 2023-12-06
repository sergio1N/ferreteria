@extends('layauds.base')

@section('contenido')
    <h1>Detalles de Pedidos - {{ $proveedor->nombre }}</h1>

    @if($pedidos->isEmpty())
        <p>No se han hecho pedidos a este proveedor.</p>
    @else
        <ul>
            @foreach($pedidos as $pedido)
                <li>
                    <strong>ID Pedido:</strong> {{ $pedido->idpedido }}<br>
                    <strong>Fecha:</strong> {{ $pedido->created_at }}<br>
                    <!-- Mostrar otros detalles del pedido si es necesario -->
                    @if($pedido->detalles->isEmpty())
                        <p>No hay detalles para este pedido.</p>
                    @else
                        <ul>
                            @foreach($pedido->detalles as $detalle)
                                <li>
                                    <strong>ID Detalle:</strong> {{ $detalle->iddetallepedido }}<br>
                                    <strong>Descripción:</strong> {{ $detalle->descripcion }}<br>
                                    <!-- Mostrar otros detalles del detalle si es necesario -->
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <hr>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

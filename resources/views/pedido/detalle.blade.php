@extends('layauds.base')
@section('contenido')

<link rel="stylesheet" href="{{ asset('css/detallepedido.css') }}">
@foreach($pedido as $pedid)
    <div class="detalle-pedido">
        <h2>Detalles del Pedido </h2>
        <div class="detalle-info">
            <p><strong>Producto:</strong> {{ $pedid->producto }}</p>
            <p><strong>Foto:</strong> {{ $pedid->foto }}</p>
            <p><strong>Descripción:</strong> {{ $pedid->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $pedid->precio }}</p>
            <p><strong>Cantidad:</strong> {{ $pedid->cantidad }}</p>
            <p><strong>Valor Total:</strong> {{ $pedid->valortotal }}</p>
        </div>
    </div>
@endforeach
@endsection

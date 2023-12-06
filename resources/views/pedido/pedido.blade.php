@extends('layauds.base')

@section('contenido')

<style>
    /* Agrega estos estilos en tu hoja de estilos o en la etiqueta <style> de la vista */

body {
    background-color: #f5f5f5; /* Fondo gris claro para toda la página */
}

.pedidos-container {
    max-width: 600px; /* Ancho máximo del contenedor */
    margin: 50px auto; /* Centra el contenedor en la página */
}

.pedidos-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.pedidos-table th,
.pedidos-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd; /* Borde delgado gris para celdas */
}

.pedidos-table th {
    background-color: #e74c3c; /* Fondo rojo para encabezados */
    color: #fff; /* Texto blanco para encabezados */
}
</style>
<div class="pedidos-container">
    <h1>Pedidos para {{ $proveedor ? $proveedor->nombre : 'Proveedor no disponible' }}</h1>

    @if ($pedidos->isEmpty())
        <p>A este proveedor no se le han hecho pedidos.</p>
    @else
        <ul>
            @foreach ($pedidos as $pedido)
                <li>
                    @if ($pedido->proveedor)
                        {{ $pedido->proveedor->nombre }}
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>

@endsection

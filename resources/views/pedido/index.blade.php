@extends('layauds.base')

@section('contenido')
<a href="{{ route('pedidos.pendientes') }}">Ver Pedidos Pendientes</a>
    <h1>Lista de Pedidos</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Archivo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->proveedor->nombre }}</td>
                    <td>{{ $pedido->nombre_archivo }}</td>
                    <td>{{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pedidos->links('pagination::bootstrap-4') }}
@endsection

@extends('layauds.base')

@section('content')
    <div class="container">
        <h1>Pedidos del Proveedor: {{ $proveedor->nombre }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Foto de Factura</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido as $pedid)
                    <tr>
                        <td>{{ $pedid->idpedido }}</td>
                        <td><img src="{{ asset('ruta/a/tu/imagen/' . $pedid->foto) }}" alt="Factura"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

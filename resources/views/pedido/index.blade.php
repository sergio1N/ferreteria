@extends('roles.admin.homeAdmin')
@section('adminContenido')
<link rel="stylesheet" href="{{ asset('css/indexpedido.css') }}">
<br>
<br>
<br>
<br>
<br>
<br>
    <h1>Lista de Pedidos</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Imagen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->proveedor->nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="#" onclick="mostrarImagen('{{ Storage::disk('pedido')->url($pedido->fotofactura) }}')">
                            <img src="{{ Storage::disk('pedido')->url($pedido->fotofactura) }}" alt="Imagen del Pedido">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('pedidos.admitir.form', $pedido->idpedido) }}" class="btn btn-primary">Admitir</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pedidos->links('pagination::bootstrap-4') }}

    <div id="modalImagen" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7);">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <span class="cerrar-modal" onclick="cerrarModal()" style="color: #fff; font-size: 20px; cursor: pointer; position: absolute; top: 10px; right: 15px;">&times;</span>
            <img id="imagenModal" class="contenido-modal" style="max-width: 90%; max-height: 90%;">
        </div>
    </div>

    <script>
        function mostrarImagen(url) {
            console.log(url); // Imprime la URL en la consola
            document.getElementById('imagenModal').src = url;
            document.getElementById('modalImagen').style.display = 'block';
        }

        function cerrarModal() {
            // Cierra la ventana modal
            document.getElementById('modalImagen').style.display = 'none';
        }
    </script>
@endsection

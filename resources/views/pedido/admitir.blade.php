@extends('roles.admin.homeAdmin')
@section('adminContenido')
<br>
<br>
<br>
<br>
<br>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/detallepedi.css') }}">
    <!-- JavaScript -->
    <script src="{{ asset('js/detallepedido.js') }}"></script>

    <h1>Admitir Pedido</h1>

    <form action="{{ route('detallepedido.store') }}" method="POST">
        @csrf
        <!-- Otros campos del formulario -->
    
        <!-- Lista desplegable de productos -->
        <label for="idproducto">Selecciona un Producto:</label>
        <select name="idproducto" id="idproducto" required>
            @foreach ($productos as $producto)
                <option value="{{ $producto->idproducto }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>
    
        <!-- Campo de cantidad -->
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" required>
    
        <!-- Campo de precio unitario -->
        <label for="preciounitario">Precio Unitario:</label>
        <input type="number" name="preciounitario" id="preciounitario" required>
    
        <!-- Campo oculto para enviar el id del pedido -->
        <input type="hidden" name="idpedido" value="{{ $pedido->idpedido }}">
    
        <!-- Botón para agregar más productos -->
        <button type="button" onclick="agregarProducto()">Agregar Producto</button>
    
        <!-- Contenedor para productos adicionales -->
        <div id="productos-container"></div>
    
        <!-- Campo de detalle del pedido (único para todo el pedido) -->
        <label for="detalle">Detalle del Pedido:</label>
        <textarea name="detalle" id="detalle" cols="30" rows="10" required></textarea>
    
        <!-- Botón para finalizar el pedido -->
        <button type="button" onclick="finalizarPedido()">Finalizar Pedido</button>
    
        <!-- Botón para guardar el detalle del pedido -->
        <button type="submit">Guardar Detalle</button>
    </form>
    

    <!-- Modal para mostrar el valor total -->
    <div id="modalValorTotal" class="modal" style="display: none;">
        <div class="modal-contenido">
            <p id="valorTotalMensaje"></p>
            <button onclick="cerrarModal()">Cerrar</button>
        </div>
    </div>

    <script>
        const proveedoresIndexRoute = "{{ route('proveedores.index') }}";
    </script>
@endsection

@extends('roles.admin.homeAdmin')
@section('adminContenido')
    <link rel="stylesheet" href="{{ asset('css/detallepedido.css') }}">

    <h2>Realizar Nuevo Pedido</h2>

    <form action="{{ route('pedido.store') }}" method="post">
        @csrf

        <!-- Aquí puedes agregar campos para la información general del pedido -->

        <!-- Sección para agregar productos al pedido -->
        <div class="detalle-pedido">
            <h3>Agregar Producto al Pedido</h3>

            <!-- Campos para los detalles del producto -->
            <label for="producto">Producto:</label>
            <input type="text" name="producto[]">

            <!-- Agrega más campos según sea necesario (foto, descripción, precio, cantidad, etc.) -->

            <button type="button" class="btn btn-success" id="agregarProducto">Agregar Producto</button>
        </div>

        <div id="productosContainer"></div>

        <button type="submit" class="btn btn-primary">Realizar Pedido</button>
    </form>

    <script>
        // Script para agregar dinámicamente campos de productos
        document.getElementById('agregarProducto').addEventListener('click', function () {
            const container = document.getElementById('productosContainer');
            const productoHtml = document.querySelector('.detalle-pedido').innerHTML;

            const div = document.createElement('div');
            div.classList.add('detalle-pedido');
            div.innerHTML = productoHtml;

            container.appendChild(div);
        });
    </script>
@endsection

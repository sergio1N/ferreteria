@extends('layauds.base')

@section('content')
    <h1>Crear Detalle de Pedido</h1>

    <form action="{{ route('detallepedido.store') }}" method="POST">
        @csrf

        <div>
            <label for="idpedido">ID del Pedido:</label>
            <input type="text" id="idpedido" name="idpedido" value="{{ $pedido->id }}" readonly>
        </div>

        <div>
            <label for="idproducto">ID del Producto:</label>
            <input type="text" id="idproducto" name="idproducto" required>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>

        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required>
        </div>

        <div>
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required>
        </div>

        <div>
            <label for="valortotal">Valor Total:</label>
            <input type="number" id="valortotal" name="valortotal" required>
        </div>

        <button type="submit">Guardar Detalle de Pedido</button>
    </form>
@endsection

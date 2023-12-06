@extends('layauds.base')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/pedido.css') }}">
<div class="table-container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoPedido"> Agregar Pedido </button>
    <a href="{{ route('pedidos.index') }}" class="btn btn-primary">Ver Pedidos</a>

<h1>Lista de Proveedores</h1>
<ul>
    @foreach($proveedores as $proveedor)
        @if($proveedor->visible)
            <li>
                <a href="{{ route('pedidos.por_proveedor', $proveedor->idproveedor) }}">
                    {{ $proveedor->nombre }}
                </a>
            </li>
        @endif
    @endforeach
</ul>


<div class="modal fade" id="nuevoPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar un nuevo pedido -->
                <form id="nuevoPedidoForm" action="{{ route('pedidos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="proveedor">Proveedor</label>
                        <select id="proveedor" name="idproveedor" required>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->idproveedor }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="fotoFactura">Foto de la Factura</label>
                        <input type="file" id="fotoFactura" name="fotoFactura" accept="image/*" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layauds.base')
@section('contenido')
    @if (session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('crearpro.store') }}" autocomplete="off" method="POST" enctype="multipart/form-data" >
        @csrf
        <h6>Completa los siguientes campos para ingresar un nuevo producto</h6>

        <label for="marca">Marca:</label>
        <select id="marca" name="marca" required>
            <option value="" disabled selected>Selecciona una marca</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->idmarca }}">{{ $marca->nombre }}</option>
            @endforeach
            <option value="nueva">¿Nueva Marca?</option>
        </select>
        <br>
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
            <option value="" disabled selected>Selecciona una categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->idcategoria}}">{{ $categoria->nombre }}</option>
            @endforeach
            <option value="nuevaC">¿Nueva categoria?</option>
            <br>
            <br>
        </select>
        <br>
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" placeholder="Digite el producto" id="nombre" readquired>
        <br>
        <label for="estanteria">Estanteria:</label>
        <select id="estanteria" name="estanteria" required>
            <option value="" disabled selected>Selecciona una estanteria</option>
            @foreach ($estanterias as $estanteria)
                <option value="{{ $estanteria->idestanteria }}">{{ $estanteria->nombre }}</option>
            @endforeach

        </select>
        <br>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" required accept="image/*" capture>
        <br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" placeholder="$70000"><br required>

        <label for="unidadm">Unidad de medida:</label>
        <input type="text" id="unidadm" name="unidadm" placeholder="Kg, M, Mm, etc" oninput="mostrarOcultarCantidad()">
        <br>
        <label for="medida">Cantidad medida:</label>
        <input type="text" id="medida" name="medida" placeholder="25" style="display: none;">
        <br>
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Descripción" required>
        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" placeholder="cantidad de producto">
        <label for="carcateristicas">Caracteristicas:</label>
        <input type="text" id="caracteristicas" name="caracteristicas" placeholder="carcateristicas" required>
        <label for="Especificaciones">Especificaciones:</label>
        <input type="text" id="especificaciones" name="especificaciones" placeholder="Especificaciones" required>
        <!--aqui id persona-->
        <input type="hidden" id="idper" name="idper" value="1">
        <button class="botonos" id="btn-crearProduco" type="submit">Crear</button>

    </form>

    <!-- Modal para marca -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Marca</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nuevaMarcaForm" action="{{ route('marca.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <label for="marcanom">Nombre</label>
                        <input type="text" id="marcanom" name="marcanom" placeholder="Nombre Marca" required>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnCrearMarca" type="button" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </div><br>



    <!-- Modal para categoria -->
    <div class="modal fade" id="exampleModalCategoria" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nuevaCategoriaForm" action="{{ route('categoria.store') }}" method="POST"
                        autocomplete="off">
                        @csrf
                        <label for="categorianom">Nombre</label>
                        <input type="text" id="categorianom" name="categorianom" placeholder="Nombre Categoria">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnCrearCategoria" type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </div>
@endsection

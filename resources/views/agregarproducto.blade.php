@extends('layauds.base')
@section('contenido')
    <form action="" autocomplete="off" method="POST">
        @csrf
        Completa los siguientes campos para ingresar un nuevo producto
        <label for="marca">Marca:</label>
        <select id="marca" name="marca" required>
            <option value="" disabled selected>Selecciona una marca</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
            @endforeach
            <a href="">
                <option value="">¿Nueva Marca?</option>
            </a>
        </select>
        <br>
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
            <option value="" disabled selected>Selecciona una categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
            <a href="">
                <option value="">¿Nueva categoria?</option>
            </a>
            <br>

        </select>
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Digite el producto" id="nombre" readquired>
        <br>
        <label for="estanteria">Estanteria:</label>
        <select id="estanteria" name="estanteria" required>
            <option value="" disabled selected>Selecciona una estanteria</option>
            @foreach ($estanterias as $estanteria)
                <option value="{{ $estanteria->id }}">{{ $estanteria->nombre }}</option>
            @endforeach
            <a href="">
                <option value="">¿Nueva categoria?</option>
            </a>
        </select>
        <br>
        <label for="imagen">Imagen:</label>
<input type="file" name="imagen" id="imagen" accept="image/*">
        <br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" placeholder="$70000"><br>
        <label for="unidadm">unidad de medida:</label>
        <input type="text" id="unidadm" name="unidadm" placeholder="Kg,M,Mm etc">
        <br>
        <label for="medida">Cantidad medida:</label>
        <input type="text" id="medida" name="medida" placeholder="25">
        <br>
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Descripción">
        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" placeholder="cantidad de producto">
        <label for="carcateristicas">Caracteristicas:</label>
        <input type="text" id="caracteristicas" name="caracteristicas" placeholder="carcateristicas">
        <label for="Especificaciones">Especificaciones:</label>
        <input type="text" id="especificaciones" name="especificaciones" placeholder="Especificaciones">

        <button class="botonos" id="btn-crearProduco" type="submit">Crear</button>

    </form>
    <script src="{{ asset('js/agregarproducto.js') }}"></script>
    
@endsection

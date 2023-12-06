@extends('layauds.base')
@section('contenido')
    <div class="filtro">
        <div class="buscador">
            <input type="text" id="buscador" placeholder="Buscar por nombre">
        </div>
        <br>
        <form id="formBuscar" action="{{ route('buscar.productos') }}" method="POST">
            @csrf
            <select class="form-control" id="categorias" name="categorias">
                <option value="Todos">Todas las categorías</option>
                @foreach ($categorias as $producto)
                    <option value="{{ $producto->nombre }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
            <select class="form-control" id="marcas" name="marcas">
                <option value="Todos">Todas las Marcas</option>
                @foreach ($marcas as $marka)
                    <option value="{{ $marka->nombre }}">{{ $marka->nombre }}</option>
                @endforeach
            </select>

            <select class="form-control" id="precio" name="precio">
                <option value="Todos">Todos</option>
                <option value="asc">Menor precio primero</option>
                <option value="desc">Mayor precio primero</option>
            </select>
            <button type="submit">Buscar</button>
        </form>
    </div>
    {{-- contenido de productos --}}
    <div class="products-conatiner" id="resultadobusqueda">
        @foreach ($product as $producto)
            <div class="box">
                <a href="{{ route('productos.vista', ['id' => $producto->idproducto]) }}">
                    <img class="" src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                </a>
                <span>productos disponibles</span>
                <h2>{{ $producto->nombre }}</h2>
                <h3 class="price">${{ $producto->precio }} <span>{{ $producto->unidadmedida }}</span></h3>
                <i class='bx bx-cart-alt' data-toggle="modal" data-target="#productoModal"
                    data-imagen="{{ asset($producto->imagen) }}" data-nombre="{{ $producto->nombre }}"
                    data-descripcion="{{ $producto->descripcion }}" data-precio="{{ $producto->precio }}"></i>
                <i class='bx bx-heart'></i>
                <span class="discount">-25%</span>
            </div>
        @endforeach
    </div>
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/profiltro.css') }}">
    {{-- link to js --}}
    <script src="{{ asset('js/profiltro.js') }}"></script>

@endsection

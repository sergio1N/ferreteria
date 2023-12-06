@extends('layauds.base')
@section('contenido')
    <div class="container-title">
        <h2>{{ $producto->nombre }}</h2>
    </div>

    <main>
        <div class="container-img">
            <img src="{{ asset($producto->imagen) }}" alt="imagen-producto">
        </div>
        <div class="container-info-product">
            <div class="container-price">
                <span>${{ $producto->precio }}</span>
            </div>
            <div class="container-details-product">
                <div class="moni">
                    <div class="moni-item">
                        <h6>Medida:‎ <b>{{ $producto->unidadmedida }}</b></h6>
                    </div>
                    <div class="moni-item">
                        <h6>Inventario:‎ <b>{{ $producto->stock }}</b></h6>
                    </div>
                    <div class="moni-item">
                        <h6>Marca:‎ <b>{{ $producto->marca->nombre }}</b></h6>
                    </div>
                </div>

                <div class="container-add-cart">

                    <button id="agregarCarrito" class="btn btn-success"> <i class='bx bx-cart-alt' data-toggle="modal"
                            data-target="#productoModal" data-imagen="{{ asset($producto->imagen) }}"
                            data-nombre="{{ $producto->nombre }}" data-descripcion="{{ $producto->descripcion }}"
                            data-precio="{{ $producto->precio }}">Añadir al carrito</i>
                    </button>

                </div>
                <!-- Modal -->
                <div class="modal fade" id="productoModal" tabindex="-1" role="dialog"
                    aria-labelledby="productoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productoModalLabel">Detalles del Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--  detalles del producto -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <img id="productoImagen" src="#" alt="Producto">
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Información del producto -->
                                        <h4 id="productoNombre"></h4>
                                        <p id="productoDescripcion"></p>
                                        <p>Precio: $<span id="productoPrecio"></span></p>
                                        <p> medida: <span id="productoUnidadMedida"></span></p>
                                        <p>Total: $<span id="productoTotal">0</span></p>
                                        <!-- Contador de cantidad -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button id="restarCantidad" class="btn btn-outline-secondary"
                                                    type="button">-</button>
                                            </div>
                                            <input type="text" id="cantidad" class="form-control text-center"
                                                value="0" readonly>
                                            <div class="input-group-append">
                                                <button id="sumarCantidad" class="btn btn-outline-secondary"
                                                    type="button">+</button>
                                            </div>
                                        </div>
                                        <button id="agregarCarrito" class="btn btn-success">Agregar al carrito ‎ <i
                                                class='bx bx-cart-alt'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container-description">
                    <div class="title-description">
                        <h4>Descripción</h4>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="text-description">
                        <p>
                            {{ $producto->descripcion }}
                        </p>
                    </div>
                </div>

                <div class="container-additional-information">
                    <div class="title-additional-information">
                        <h4>Caracteristicas</h4>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="text-additional-information hidden">
                        <p>{{ $producto->caracteristicas }}</p>
                    </div>
                </div>

                <div class="container-reviews">
                    <div class="title-reviews">
                        <h4>Especificaciones</h4>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="text-reviews hidden">
                        <p>{{ $producto->especificaciones }}</p>
                    </div>
                </div>

                <div class="container-social">
                    <span>Compartir</span>
                    <div class="container-buttons-social">
                        <a href="#"><i class="fa-solid fa-envelope"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
    </main>

    <section class="container-related-products">
        @if ($productosRelacionados->isEmpty())
            <h2>Más de nuestros productos</h2>
            <div class="products-conatiner">
                @foreach ($random as $productoRandom)
                    <div class="box">
                        <a href="{{ route('productos.vista', ['id' => $productoRandom->idproducto]) }}">
                            <img class="" src="{{ asset($productoRandom->imagen) }}" alt="{{ $productoRandom->nombre }}">
                        </a>
                        <span>Productos disponibles</span>
                        <h2>{{ $productoRandom->nombre }}</h2>
                        <h3 class="price">${{ $productoRandom->precio }} <span>{{ $productoRandom->unidadmedida }}</span></h3>
                        <i class='bx bx-cart-alt' data-toggle="modal" data-target="#productoModal"
                            data-imagen="{{ asset($productoRandom->imagen) }}" data-nombre="{{ $productoRandom->nombre }}"
                            data-descripcion="{{ $productoRandom->descripcion }}" data-precio="{{ $productoRandom->precio }}"></i>
                        <i class='bx bx-heart'></i>
                        <span class="discount">-25%</span>
                    </div>
                @endforeach
            </div>
        @else
            <h2>Más productos como este</h2>
            <div class="products-conatiner">
                @foreach ($productosRelacionados as $productoRelacionado)
                    <div class="box">
                        <a href="{{ route('productos.vista', ['id' => $productoRelacionado->idproducto]) }}">
                            <img class="" src="{{ asset($productoRelacionado->imagen) }}" alt="{{ $productoRelacionado->nombre }}">
                        </a>
                        <span>Productos disponibles</span>
                        <h2>{{ $productoRelacionado->nombre }}</h2>
                        <h3 class="price">${{ $productoRelacionado->precio }} <span>{{ $productoRelacionado->unidadmedida }}</span></h3>
                        <i class='bx bx-cart-alt' data-toggle="modal" data-target="#productoModal"
                            data-imagen="{{ asset($productoRelacionado->imagen) }}" data-nombre="{{ $productoRelacionado->nombre }}"
                            data-descripcion="{{ $productoRelacionado->descripcion }}" data-precio="{{ $productoRelacionado->precio }}"></i>
                        <i class='bx bx-heart'></i>
                        <span class="discount">-25%</span>
                    </div>
                @endforeach
            </div>
        @endif

    </section>


    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/detallepro.css') }}">
    <script src="{{ asset('js/detallepro.js') }}"></script>
@endsection

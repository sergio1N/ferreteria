@extends('layauds.base')
@section('contenido')
    
    {{-- home --}}
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            {{-- slide 1 --}}
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>aqui span</span>
                    <h1>contenido slider</h1>
                    <a href="#" class="boton">Ir<i class='bx bx-right-arrow-alt'></i></a>

                </div>
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
            </div>
            {{-- slide 2 --}}
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>aqui span</span>
                    <h1>contenido numero 2</h1>
                    <a href="#" class="boton"><i class='bx bx-right-arrow-alt'></i></a>
                </div>
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
            </div>
            {{-- slide 3 --}}
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>aqui span</span>
                    <h1>contenido numero 3 </h1>
                    <a href="" class="boton">visitar<i class='bx bx-right-arrow-alt'></i></a>
                </div>
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>
    {{-- categoriass --}}
    <section class="categories" id="categories">
        <div class="heading">
            <h1>explorar <br><span>categorias</span></h1>
            <a href="#" class="boton">Mirar más<i class='bx bx-right-arrow-alt'></i></a>
        </div>
        {{-- container --}}
        <div class="categories-container">
            {{-- caja 1 --}}
            <div class="box box1">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>electricos</h2>
                <span> items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 2 --}}
            <div class="box box2">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>desternilladores</h2>
                <span>22 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 3 --}}
            <div class="box box3">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>contruccion</h2>
                <span>62 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 4 --}}
            <div class="box box4">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>baldosas</h2>
                <span>62 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 5 --}}
            <div class="box box5">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>alambrado</h2>
                <span>12 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
        </div>
    </section>

    {{-- productos --}}
    <section class="products" id="products">
        <div class="heading">
            <h1>Nuestros <br><span>productos</span></h1>
            <a href="{{route('productos.filtro')}}" class="boton">Mirar más<i class='bx bx-right-arrow-alt'></i></a>
        </div>
    </section>
    {{-- contenido de productos --}}
    <div class="products-conatiner">
        @foreach ($productos as $producto)
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

    <!-- Modal -->
    <div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productoModalLabel">Detalles del Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--  detalles del producto -->
                    <div class="row">
                        <div class="col-md-6">
                            <img id="productoImagen" src="#" alt="Producto">
                            <!--  más detalles del producto -->
                            <a href="{{ route('productos.vista', ['id' => $producto->idproducto]) }}">
                                <button id="masDetalles" class="btn btn-primary">Más Detalles</button>
                            </a>

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
                                <input type="text" id="cantidad" class="form-control text-center" value="0"
                                    readonly>
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
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    {{-- link to js --}}
    <script src="{{ asset('js/swiper.js') }}"></script>
@endsection

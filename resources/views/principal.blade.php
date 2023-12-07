@extends('layauds.base')
@section('contenido')
    {{-- home --}}
    @if (session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
        <script>
            const successMessage = document.getElementById('success-message');
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000); // 3000 milisegundos = 3 segundos
        </script>
    @endif
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            {{-- slide 1 --}}
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>Lo mejor en precios y productos</span>
                    <h1>Bienvenido a ferreteria S&J</h1>

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

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    {{-- productos --}}
    <section class="products" id="products">
        <div class="heading">
            <h1>Nuestros <br><span>productos</span></h1>
            <a href="{{ route('productos.filtro') }}" class="boton">Mirar más<i class='bx bx-right-arrow-alt'></i></a>
        </div>
    </section>
    {{-- contenido de productos --}}
    <div class="products-conatiner">
        @foreach ($productos as $producto)
            <div class="box">
                <a href="{{ route('productos.vista', ['id' => $producto->idproducto]) }}">
                    <img class="" src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                </a>

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

     {{-- categoriass --}}
     <section class="categories" id="categories">
        <div class="heading">
            <h1>Explorar <br><span>categorias</span></h1>
        </div>
        {{-- container --}}
        <div class="categories-container">
            {{-- caja 1 --}}
            <div class="box box1">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>Electricos</h2>
                <span>15 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 2 --}}
            <div class="box box2">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>Herramienta</h2>
                <span>22 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 3 --}}
            <div class="box box3">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>Contruccion</h2>
                <span>62 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 4 --}}
            <div class="box box4">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>Baldosas</h2>
                <span>62 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            {{-- caja 5 --}}
            <div class="box box5">
                <img class="" src="{{ asset('\imagenes\logotipo\logo.png') }}" alt="">
                <h2>Alambrado</h2>
                <span>12 items</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
        </div>
    </section>

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
                            <form action="{{ route('carrito.agregar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <!-- Información del producto -->
                                <h4 id="productoNombre"></h4>
                                <p id="productoDescripcion"></p>
                                <p>Precio: $<span id="productoPrecio"></span></p>
                                <p> medida: <span id="productoUnidadMedida"></span></p>
                                <p>Total: $<span id="productoTotal">0</span></p>
                                <!-- Contador de cantidad -->
                                <input type="hidden" name="id_producto" id="id_producto"
                                    value="{{ $producto->idproducto }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button id="restarCantidad" class="btn btn-outline-secondary"
                                            type="button">-</button>
                                    </div>
                                    <input type="text" id="cantidad" name="cantidad" min="1"
                                        class="form-control text-center" value="1" readonly>
                                    <div class="input-group-append">
                                        <button id="sumarCantidad" class="btn btn-outline-secondary"
                                            type="button">+</button>
                                    </div>
                                </div>
                                @guest
                                    <!-- Botón para mostrar el modal -->
                                    <button class="btn btn-success" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Agregar al carrito ‎ <i class='bx bx-cart-alt'></i>
                                    </button>
                                @else
                                    <!-- Botón para usuarios autenticados -->
                                    <button type="submit" class="btn btn-success">
                                        Agregar al carrito ‎ <i class='bx bx-cart-alt'></i>
                                    </button>
                                @endguest
                            </form>
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
<script>
    function mostrarOcultarCantidad() {
        var unidadMedida = document.getElementById('unidadm').value;
        var medidaInput = document.getElementById('medida');
        var labelMedida = document.getElementById('labelMedida');
        
        if (unidadMedida === 'unidades') {
            medidaInput.style.display = 'block';
            labelMedida.style.display = 'block';
        } else {
            medidaInput.style.display = 'none';
            labelMedida.style.display = 'none';
        }
    }
</script>
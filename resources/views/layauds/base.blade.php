<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- CSS --}}
     {{-- <link rel="stylesheet" href="{{ asset('css/estiloweb.css') }}">--}}
    <script></script>
    {{-- caja de iconos --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    {{-- slider --}}
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <!-------------boostrap------------------------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <!---->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>ferreteria S&J </title>
    <link rel="icon" href="{{ asset('imagenes/logotipo/logo.png') }}" type="image/png">
</head>

<body>
    <header>
        <a href="#" class="logo"><img class="logotipo" src="{{ asset('imagenes/logotipo/logo.png') }}"
                alt=""></i>S&j </a>
        {{-- icono-menu --}}
        <div class="bx bx-menu" id="menu-icon"></div>

        {{-- Lista de navegacion --}}
        <ul class="navbarr">
            <li><a href="#home" class="home-active">inicio</a></li>
            <li><a href="#categories">Categorias</a></li>
            <li><a href="#products">Productos</a></li>
        </ul>
        <div class="floating-cart">
            <a href="{{ route('carrito.compra') }}" style="position: relative;">
                <i class='bx bxs-cart'></i>
                <span class="cart-count"></span> <!-- Aquí se mostrará la cantidad -->
            </a>
        </div>
        <script>
            $(document).ready(function() {
                // Hacer la solicitud para obtener la cantidad de productos en el carrito
                $.ajax({
                    type: 'GET',
                    url: '{{ route("carrito.cantidad") }}',
                    success: function(response) {
                        // Actualizar la burbuja del carrito con la cantidad obtenida
                        $('.cart-count').text(response.cantidad);
                    },
                    error: function() {
                        console.log('Error al obtener la cantidad de productos en el carrito.');
                    }
                });
            });
        </script>
        {{-- perfil --}}
        <div class="profile">
            <nav>
                <ul>
                    <li><a href="/">Inicio</a></li>
                    @guest
                        <!-- Si el usuario no está autenticado -->
                        <li> <a href="{{ route('productos.index') }}">iniciar sesion</a></li>
                    @else
                        <!-- Si el usuario está autenticado -->
                        <span><a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></span>
                        <i class='bx bx-caret-down'></i>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Cerrar sesión</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>
    @yield('contenido')
    <footer>
        <section class="footer" id="footer">
            <div class="footer-box">
                <a href="#" class="logo"><img class="logotipo"
                        src="{{ asset('imagenes/logotipo/logo.png') }}"alt=""></i>S&j </a>
                <p>direccion</p>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                </div>
            </div>
            <div class="footer-box">
                <h2>categorias</h2>
                <a href="#">cositas</a>
                <a href="#">cositas2</a>
                <a href="#">cositas3</a>
                <a href="#">cositas4</a>
            </div>
            <div class="footer-box">
                <h2>Enlaces</h2>
                <a href="#">enlaces</a>
                <a href="#">enlaces2</a>
                <a href="#">enlaces3</a>
                <a href="#">enlaces4</a>
            </div>
            <div class="footer-box">
                <h2>informacion</h2>
                <p>pendiente</p>
                <form action="">
                    <input type="email" name="" id="" placeholder="acceder a promociones">
                    <i class='bx bx-arrow-back bx-rotate-180'></i>
                </form>
            </div>
        </section>
    </footer>
</body>

</html>

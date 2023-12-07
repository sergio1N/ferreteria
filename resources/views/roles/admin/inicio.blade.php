@extends('roles.admin.homeAdmin')
@section('adminContenido')
    <link rel="stylesheet" href="{{ asset('css/inicioadmin.css') }}">
    <br>
    <br>
    <br>
    <br>
    <div class="presentacion">
        <h1>Bienvenido administrador</h1>
        <p>"¡Buenos días, líder de la eficiencia y maestro de la organización! Listo para un día lleno de desafíos y
            logros."</p>
    </div>
    <div class="contenedorpadre">
        <div class="contenedor">
            <a href="{{ route('busquedapro.index') }}">
                <figure>
                    <img src="https://static6.depositphotos.com/1000144/599/i/450/depositphotos_5993221-stock-photo-set-of-working-tools.jpg">
                    <div class="capa">
                        <h3>¡Bienvenido a la sección de Gestión de Productos!</h3>
                        <p> Variedad de acciones para mantener actualizado y optimizado nuestro inventario.</p>
                    </div>
                </figure>
            </a>
        </div>
        <div class="contenedor">
            <a href="{{ route('proveedor.index') }}">
                <figure>
                    <img src="https://redautonomos.es/images/pymes/negociacion-proveedores.jpg">
                    <div class="capa">
                        <h3>"¡Bienvenido a la sección de Gestión de Proveedores!</h3>
                        <p>Aqui tienes el control total sobre nuestros proveedores clave. </p>
                    </div>
                </figure>
            </a>
        </div>
        <div class="contenedor">
            <a href="{{ route('proveedores.index') }}">
                <figure>
                    <img src="https://ce.entel.cl/wp-content/uploads/2022/09/gestion-de-proveedores.jpg">
                    <div class="capa">
                        <h3>"¡¡Bienvenido a la sección de Gestión de Pedidos!</h3>
                        <p> Te brinda el control total sobre el proceso de abastecimiento y gestión de pedidos </p>
                    </div>
                </figure>
            </a>
        </div>
        <div class="contenedor">
            <a href="{{ route('marca.index') }}">
                <figure>
                    <img src="https://sell.emprendepyme.net/wp-content/uploads/2017/12/tipos-de-proveedores-para-ecommerce.jpg">
                    <div class="capa">
                        <h3>"¡¡Bienvenido a la sección de Gestión de marcas!</h3>
                        <p> Te brinda la administracion y control de las marcas las marcas </p>
                    </div>
                </figure>
            </a>
        </div>
    </div>
@endsection

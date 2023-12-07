<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
     <!--vistaproductos-->
     <link rel="stylesheet" href="{{ asset('css/producto.css') }}">
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
</head>
<body>
    <!-- MENU ENCABEZADO -->
    <div class="contenedor-header">
        <header>
            <div class="logo">
                <a href="#">Admin</a>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="{{ route('busquedapro.index') }}" onclick="seleccionar()">PRODUCTOS</a></li>
                    <li><a href="{{ route('proveedor.index') }}" onclick="seleccionar()">PROVEEDOR</a></li>
                    <li><a href="{{ route('proveedores.index') }}" onclick="seleccionar()">PEDIDO</a></li>
                    <li><a href="{{ route('marca.index') }}" onclick="seleccionar()">MARCAS</a></li>
                    <li><a href="#portfolio" onclick="seleccionar()"></a></li>
                    <li><a href="#contacto" onclick="seleccionar()"></a></li>
                </ul>
            </nav>
            <div class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </header>
    </div>

    @yield('adminContenido')

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
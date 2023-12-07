    @extends('layauds.base')
    @section('contenido')
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
        <h3 class="text-center mb-5">Mi carrito de compras</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th class="text-center">Producto</th>
                        <th class="text-right">Cantidad</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Total</th>
                        <th class="text-right">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPagar = 0; // Variable para almacenar el total a pagar
                    @endphp
                    @foreach ($productosEnCarrito as $index => $carrito)
                        @php
                            $totalProducto = $carrito->cantidad * $productos[$index]->precio; // Calcula el total por producto
                            $totalPagar += $totalProducto; // Suma el total por producto al total a pagar
                        @endphp
                        <tr>
                            <td><img class="imgx" src="{{ $productos[$index]->imagen }}" alt=""></td>
                            <td class="text-center">{{ $productos[$index]->nombre }}</td>
                            <td>{{ $carrito->cantidad }}</td>
                            <td class="text-right">${{ $productos[$index]->precio }}</td>
                            <td class="text-right">${{ $totalProducto }}</td>
                            <td class="text-right">
                                <form id="eliminarProductoForm" action="{{ route('eliminar.producto', $carrito->idcarrito) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class='bx bx-trash'></i> Eliminar
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="background-color: #fff !important;">
                        <td colspan="4"></td>
                        <td style="color: #fff; background-color: #ff4545 !important;" class="text-right">
                            Total a Pagar: ${{ $totalPagar }} {{-- Muestra el total a pagar --}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            
                
        </div>
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-6">
                <a href="{{route('productos.filtro')}}"><button class="btn btn-block btn-raza">
                    <i class="bi bi-cart-plus"></i> Continuar Comprando
                </button></a>
            </div>
            <div class="col-md-6">
                @foreach ($productosEnCarrito as $index => $carrito)
                <form action="{{ route('comprar.producto', ['id' => $carrito->id]) }}" method="POST">
                    @endforeach
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-block btn-success">
                        <i class='bx bx-money'></i> Comprar
                    </button>
                </form>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
    @endsection

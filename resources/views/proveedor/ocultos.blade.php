@extends('roles.admin.homeAdmin')
@section('adminContenido')
<br>
<br>
<br>
<br>
    <h3 style="margin-bottom: 100px";>Proveedores Deshabilitados</h3>
    <a href="{{route('proveedor.index')}}"><button>regresar</button></a>
    <table class="producto">
        <thead>
            <tr>
                <th>departamento</th>
                <th>ciudad</th>
                <th>nombre</th>
                <th>telefono</th>
                <th>direccion</th>
                <th>nit</th>
                <th>correo</th>
                <th>habilitar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedorOcultos as $proOculto)
                <tr>
                    <td>{{ $proOculto->departamento }}</td>
                    <td>{{ $proOculto->ciudad }}</td>
                    <td>{{ $proOculto->nombre }}</td>
                    <td>{{ $proOculto->telefono }}</td>
                    <td>{{ $proOculto->direccion }}</td>
                    <td>{{ $proOculto->nit }}</td>
                    <td>{{ $proOculto->correo }}</td>
                    <td>
                        <form action="{{ route('proveedor.show', ['idproveedor' => $proOculto->idproveedor]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Habilitar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $proveedorOcultos->links('pagination::bootstrap-4') }}
@endsection

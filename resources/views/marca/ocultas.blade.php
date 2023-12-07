@extends('roles.admin.homeAdmin')
@section('adminContenido')

<br>
<br>
<br>
<br>
<br>

    <h3>Marcas Ocultas</h3>
    <a href="{{route('marca.index')}}"><button>regresar</button></a>
    <table class="producto">
        <thead>
            <tr>
                <th>Nombre de la Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcasOcultas as $marca)
                <tr>
                    <td>{{ $marca->nombre }}</td>
                    <td>
                        <form action="{{ route('marca.show', ['idmarca' => $marca->idmarca]) }}" method="post">
                            @csrf
                            <button type="submit">Mostrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

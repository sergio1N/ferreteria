@extends('roles.admin.homeAdmin')
@section('adminContenido')
<script src="{{ asset('js/agregarproducto.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/ocultosprovedores.css') }}">
<main>
    <br>
    <br>
    <br>
    <br>
    
    <body>
            
            <br>
            <a href="{{ route('marcas.ocultas') }}"><button>marcas desabilitadas</button></a>

            <a data-bs-toggle="modal" data-bs-target="#marcanueba"><button value="nueva">nuevamarca</button></a>

            <table class="producto">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th colspan="2">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marc)
                        @if ($marc->visible)
                            <tr>
                                <td>{{ $marc->nombre }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $marc->idmarca }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                        </svg>
                                    </a>
                                    <!-- Botón para ocultar -->
                                    <form action="{{ route('marca.hide', ['idmarca' => $marc->idmarca]) }}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro de que quieres desabilitar este elemento?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">desabilitar</button>
                                    </form>


                                </td>
                            </tr>

                            <!-- Modal editar -->
                            <div class="modal fade" id="exampleModal{{ $marc->idmarca }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Marca</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('marca.update', ['idmarca' => $marc->idmarca]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nombre de la
                                                        marca</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="txtnombre"
                                                        value="{{ $marc->nombre }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <!-- Agregar enlaces de paginación después de la tabla -->
            {{ $marcas->links('pagination::bootstrap-4') }}
        </body>
        <!-- Modal agregar -->
        <div class="modal fade" id="marcanueba" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Marca</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="nuevaMarcaForm" action="{{ route('marca.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <label for="marcanom">Nombre</label>
                            <input type="text" id="marcanom" name="marcanom" placeholder="Nombre Marca" required>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button id="btnCrearMarca" type="button" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </div>
        </div><br>
    </main>
    
@endsection

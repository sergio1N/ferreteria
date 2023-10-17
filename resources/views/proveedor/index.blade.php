@extends('layauds.base')
@section('contenido')
    <!-- Modal agregar -->
    <div class="modal fade" id="marcanueba" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo proveedor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nuevaMarcaForm" action="{{ route('proveedor.store') }}" method="POST" autocomplete="off">
                        @csrf

                        <div>
                            <div>
                                <label for="departamento">Departamento</label>
                                <select id="departamento" name="iddepartamento" required>
                                    @foreach($departamento as $departament)
                                        <option value="{{ $departament->iddepartamento }}">{{ $departament->nombre }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            
                            
                            

                            <div>
                                <label for="ciudad">Ciudad</label>
                                <select id="ciudad" name="idciudad" required>
                                    @foreach($ciudad as $ciuda)
                                        <option value="{{ $ciuda->idciudad }}">{{ $ciuda->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="nombreProveedor">Nombre</label>
                                <input type="text" id="nombreProveedor" name="nombre" placeholder="Nombre Proveedor" required>

                            </div>
                            <div>
                                <label for="numeroProveedor">Numero</label>
                                <input type="text" id="numeroProveedor" name="telefono"
                                    placeholder="Número del proveedor" required>
                            </div>
                            <div>
                                <label for="direccionProveedor">Dirección</label>
                                <input type="text" id="direccionProveedor" name="direccion"
                                    placeholder="Dirección proveedor" required>
                            </div>
                            <div>
                                <label for="nitProveedor">NIT</label>
                                <input type="text" id="nitProveedor" name="nit" placeholder="NIT del Proveedor"
                                    required>
                            </div>
                            <div>
                                <label for="correoProveedor">Correo</label>
                                <input type="email" id="correoProveedor" name="correo" placeholder="Dirección correo"
                                    required>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button id="btnCrearMarca" type="submit " class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    </div><br>
    <a data-bs-toggle="modal" data-bs-target="#marcanueba"><button value="nueva">nuevo proveedor</button></a>
    <table class="producto">
        <a href="{{ route('proveedores-ocultos') }}"> <button>Ver Proveedores Deshabilitados</button> </a>

        <thead>
            <tr>
                <th>departamento</th>
                <th>ciudad</th>
                <th>nombre</th>
                <th>telefono</th>
                <th>direccion</th>
                <th>nit</th>
                <th>correo</th>
                <th>desabilitar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedor as $pro)
            <tr>
                <td>{{ $pro->departamento }}</td>
                <td>{{ $pro->ciudad }}</td>
                <td>{{ $pro->nombre }}</td>
                <td>{{ $pro->telefono }}</td>
                <td>{{ $pro->direccion }}</td>
                <td>{{ $pro->nit }}</td>
                <td>{{ $pro->correo }}</td>
                <td>
                    <form action="{{ route('proveedor.hide', ['idproveedor' => $pro->idproveedor]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de deshabilitar este proveedor?');">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger">Deshabilitar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </table>
    {{ $proveedor->links('pagination::bootstrap-4') }}
@endsection

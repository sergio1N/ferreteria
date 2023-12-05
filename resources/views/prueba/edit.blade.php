@extends('roles.admin.homeAdmin')
@section('adminContenido')
<br>
<br>
<br>
<br>
  <form action="{{ route('producto.update', $producto->idproducto) }}" method="POST">
    @csrf
    @method('PUT')
    <h5>Llene los siguientes campos para editar el producto seleccionado</h5>
    <br>
    <label for="nombre">Nombre</label>
    <input name="nombre" type="text" value="{{ $producto->nombre }}" id="nombre" required>
    <br>
    <label for="estanteria">Estantería:</label>
    <select id="estanteria" name="estanteria" required>
      <option value="" disabled>Selecciona una estantería</option>
      @foreach ($estanterias as $estanteria)
      <option value="{{ $estanteria->idestanteria }}" {{ $estanteria->idestanteria == $producto->idestanteria ? 'selected' : '' }}>
        {{ $estanteria->nombre }}
    </option>
    
      @endforeach
    </select>
  
  
    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="precio" value="{{ $producto->precio }}">
    <br>
    <label for="unidadmedida">Unidad de medida:</label>
    <input type="text" id="unidadmedida" name="unidadmedida" value="{{ $producto->unidadmedida }}">
    <br>
    <label for="cantidadmedida">Cantidad medida:</label>
    <input type="text" id="cantidadmedida" name="cantidadmedida" value="{{ $producto->cantidadmedida }}">
    <br>

    <button class="botonos" id="btn-crearProducto" type="submit">Editar</button>
  </form>
  <script src="{{ asset('js/agregarproducto.js') }}"></script>
@endsection

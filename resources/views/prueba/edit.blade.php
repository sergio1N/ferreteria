@extends('layauds.base')
@section('contenido')
  <form action="{{route('crearpro.store')}}" autocomplete="off" method="POST">
    <h5>llene los siguientes campos para editar el producto seleccinado</h5>
    <label for="marca">Marca:</label>
    <select id="marca" name="marca" required>
      <option value="" disabled selected>Selecciona una marca</option>
      @foreach ($producto as $productos)
         <option value="{{ $productos }}">{{ $productos }}</option>
       @endforeach
  </select>
  <br>
  <label for="categoria">Categoria:</label>
  <input type="text" placeholder="Categoria" id="categoria" required>
  <br>
  <label for="estanteria">Estanteria:</label>
  <input type="text" placeholder="Estanteria" id="Estanteria" readquired>
  <br>
  <label for="nombre">Nombre</label>
  <input type="text" placeholder="Digite el producto" id="nombre" readquired>
  <br>
  <label for="precio">Precio:</label>
 <input type="text" id="precio" name="precio" placeholder="$70000">
 <br>
 <label for="unidadm">unidad de medida:</label>
 <input type="text" id="unidadm" name="unidadm" placeholder="Kg,M,Mm etc">
 <br>
 <label for="medida">Cantidad medida:</label>
 <input type="text" id="medida" name="medida" placeholder="25">
 <br>
 <label for="descripcion">Descripcion:</label>
 <input type="text" id="descripcion" name="descripcion" placeholder="Descripción">
 <label for="stock">Stock:</label>
 <input type="text" id="stock" name="stock" placeholder="cantidad de producto">
 <label for="carcateristicas">Caracteristicas:</label>
 <input type="text" id="caracteristicas" name="caracteristicas" placeholder="carcateristicas">
 <label for="Especificaciones">Especificaciones:</label>
 <input type="text" id="especificaciones" name="especificaciones" placeholder="Especificaciones">

 <button class="botonos" id="btn-crearProduco" type="submit">Crear</button>

 </form> 
 <script src="{{ asset('js/agregarproducto.js') }}"></script>
  @endsection
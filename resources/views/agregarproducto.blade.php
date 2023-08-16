@extends('layauds.base')
@section('contenido')
  <form action="">
    <h5>llene los siguientes campos para ingresar un nuevo producto</h5>
   <input type="text" placeholder="marca" id="maraca" required>
   <input type="text" placeholder="categoria" id="categoria" required>
   <input type="text" placeholder="Estanteria" id="Estanteria" readquired>
   <input type="text" placeholder="Nombre producto" id="nombre" readquired>
   <label for="precio">Precio:</label>
   <input type="text" id="precio" name="precio" inputmode="numeric" pattern="[0-9]*">



  </form>
@endsection
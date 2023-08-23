@extends('layauds.base')
@section('contenido')

     
  <a href=""><button>ingresar producto</button></a>

  <main>
    <div class="input-container">
      <input type="search" id="search" placeholder="buscar producto">
    </div>
    <div class="errores-container">
      <p></p>
    </div>
    <div class="resultados-container">
      <table id="results">
        <thead>
          <th>idproducto</th>
          <th>idmarca</th>
          <th>idcategoria</th>
          <th>idpersona</th>
          <th>idestanteria</th>
          <th>nombre</th>
          <th>imagen</th>
          <th>precio</th>
          <th>unidadmedida</th>
          <th>cantidadmedida</th>
          <th>descripcion</th>
          <th>stock</th>
          <th>caracteristicas</th>
          <th>especificaciones</th>
        </thead>
        @foreach($producto as $pro)
          <tbody>
            <th>{{$pro->idproducto}}</th>
            <th>{{$pro->idmarca}}</th>
            <th>{{$pro->idcategoria}}</th>
            <th>{{$pro->idpersona}}</th>
            <th>{{$pro->idestanteria}}</th>
            <th>{{$pro->nombre}}</th>
            <th>{{$pro->imagen}}</th>
            <th>{{$pro->precio}}</th>
            <th>{{$pro->unidadmedida}}</th>
            <th>{{$pro->cantidadmedida}}</th>
            <th>{{$pro->descripcion}}</th>
            <th>{{$pro->stock}}</th>
            <th>{{$pro->caracteristicas}}</th>
            <th>{{$pro->especificaciones}}</th>
          </tbody>
          @endforeach
      </table>
    </div>
  </main>
  <script src="/js/barrabusqueda.js" defer></script>
@endsection
@extends('layauds.base')
@section('contenido')
  <a href=""><button>ingresar producto</button></a>
  <input type="search" id="buscador" placeholder="buscar por nombre o id" class="from-control from-control-sm" >
  


  <main>
    <html>
    <head>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      td, th {
        border: 1px solid #070707;
        text-align: left;
        padding: 8px;
        text-align: center
      }
      
      tr:nth-child(even) {
        background-color: #dcdcdc;
      }
   </style>
      </head>
      <body>
      <table>
        <tr>
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
        <th colspan="2">acciones</th>
        </tr>
          <tbody id="resultados">
            @foreach($producto as $pro)
            <tr>
            <td>{{$pro->idproducto}}</td>
            <td>{{$pro->idmarca}}</td>
            <td>{{$pro->idcategoria}}</td>
            <td>{{$pro->idpersona}}</td>
            <td>{{$pro->idestanteria}}</td>
            <td>{{$pro->nombre}}</td>
            <td>{{$pro->imagen}}</td>
            <td>{{$pro->precio}}</td>
            <td>{{$pro->unidadmedida}}</td>
            <td>{{$pro->cantidadmedida}}</td>
            <td>{{$pro->descripcion}}</td>
            <td>{{$pro->stock}}</td>
            <td>{{$pro->caracteristicas}}</td>
            <td>{{$pro->especificaciones}}</td>
            <td><a href="{{route('busquedapro.edit', $pro->idproducto)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg></a></td>
            @endforeach
          </tbody>
        </tr>
      </table>
    </body>
    </html>
    
  </main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
    $("#buscador").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#resultados tr").filter(function() {
        var idProducto = $(this).find("td:eq(0)").text().toLowerCase();
        var nombre = $(this).find("td:eq(5 )").text().toLowerCase();
        var matchId = idProducto.indexOf(value) > -1;
        var matchNombre = nombre.indexOf(value) > -1;
        $(this).toggle(matchId || matchNombre);
      });
    });
  });
</script>
@endsection
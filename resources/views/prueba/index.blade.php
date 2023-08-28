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
        border: 1px solid #dd1111;
        text-align: left;
        padding: 8px;
        text-align: center
      }
      
      tr:nth-child(even) {
        background-color: #000000;
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
        <tr>
          @foreach($producto as $pro)
          <tbody id="resultados">
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
            <td><a href="{{route('busquedapro.edit', $pro->idproducto)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg></a></td>
          </tbody>
          @endforeach
        </tr>
      </table>
    </body>
    </html>
    
  </main>
  <script>
    $(document).ready(function(){
      $("#buscador").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#resultados tr ").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
@endsection
@extends('roles.admin.homeAdmin')
@section('adminContenido')
<br>
<br>
<br>
<br>
<a href="{{ route('productos.agregar') }}"><button style="margin-bottom: 100px">ingresar producto</button></a>
<a href="{{ route('busquedapro.index') }}"><button target="_blank">productos</button></a>
@endsection
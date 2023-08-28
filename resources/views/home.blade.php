@extends('layauds.base')
@section('contenido')

     
  <a href="{{route('productos.agregar')}}"><button>ingresar producto</button></a>
  <a href="{{ route('busquedapro.index') }}" target="_blank">Ir a otra pestaña</a>
@endsection
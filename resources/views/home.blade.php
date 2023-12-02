@extends('layauds.base')
@section('contenido')
<a href="{{route('productos.agregar')}}"><button>ingresar producto</button></a>
<a href="{{route('busquedapro.index')}}" target="_blank">productos</a>
<a href="{{route('marca.index')}}"><button>ingresar marca</button></a>
<a href="{{route('proveedor.index')}}"><button>proveedor</button></a>
<a href="{{route('nombre.pedido')}}"><button>pedido</button></a>
@endsection
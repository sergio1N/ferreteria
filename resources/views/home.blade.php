@extends('layauds.base')
@section('contenido')
    <a href="{{ route('productos.agregar') }}"><button style="margin-bottom: 100px">ingresar producto</button></a>
    <a href="{{ route('busquedapro.index') }}" target="_blank">productos</a>
    <a href="{{ route('marca.index') }}"><button>ingresar marca</button></a>
    <a href="{{ route('proveedor.index') }}"><button>proveedor</button></a>
    <a href="{{ route('pedido.index') }}"><button>pedido</button></a>
@endsection


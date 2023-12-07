@extends('roles.admin.homeAdmin')
@section('adminContenido')
<br>
<br>
<br>
<br>
<br>
<a href="{{ route('busquedapro.index') }}"><button>productos</button></a>
<br>
<br>
<a href="{{ route('marca.index') }}"><button>ingresar marca</button></a>
<a href="{{ route('proveedor.index') }}"><button>proveedor</button></a>
<a href="{{ route('proveedores.index') }}" class="btn btn-primary">pedido</a>
@endsection

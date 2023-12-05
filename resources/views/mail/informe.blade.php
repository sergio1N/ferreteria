<!DOCTYPE html>
<html>
<head>
    <title>Informe de Inventario</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Informe de Inventario</h2>

<table>
    <thead>
    <tr>
        <th>ID Producto</th>
        <th>Nombre</th>
        <th>Stock</th>
        <th>Vendido Hoy</th>
        <th>Valor Ganado Hoy</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->idproducto }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->vendido_hoy }}</td>
            <td>{{ $producto->valor_ganado }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>

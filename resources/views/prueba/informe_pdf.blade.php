<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        h1 {
            color: #333;
            display: inline-block; 
        }

        #logo {
            max-width: 100px; 
            height: auto;
            margin-bottom: 20px;
            margin-right: 20px; 
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <img id="logo" src="{{ asset('imagenes/logotipo/logo.png') }}" alt="">
    <h1>Informe de Ventas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad en Stock</th>
                <th>Cantidad Vendida en las Últimas 24 Horas</th>
                <th>Valor Total de Ventas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($informe as $item)
                <tr>
                    <td>{{ $item['nombre'] }}</td>
                    <td>{{ $item['cantidadStock'] }}</td>
                    <td>{{ $item['cantidadVendida'] }}</td>
                    <td>{{ $item['valorTotalVentas'] }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td>Total General</td>
                <td></td>
                <td></td>
                <td>{{ $totalVentas }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

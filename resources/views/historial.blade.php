<!DOCTYPE html>
<html>
<head>
    <title>Mi Historial</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-primary {
            background: #3A2C0F;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #3A2C0F;
            color: white;
        }
        tr:hover {
            background: #f5f5f5;
        }
        .empty {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Mi Historial de Mensajes</h1>
        <a href="{{ route('galleta.mostrar') }}" class="btn btn-primary">Volver a la Galleta</a>
    </div>

    @if($historial->count() > 0)
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Mensaje</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
            @foreach($historial as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->frase->mensaje }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="empty">
            <p>Aún no has abierto ninguna galleta. ¡Ve a jugar!</p>
        </div>
    @endif
</div>
</body>
</html>

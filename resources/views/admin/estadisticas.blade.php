<!DOCTYPE html>
<html>
<head>
    <title>Estadísticas Globales</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 1200px;
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
            margin-bottom: 30px;
        }
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-left: 10px;
        }
        .btn-primary {
            background: #3A2C0F;
            color: white;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 8px;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .stat-card h3 {
            margin: 0 0 10px 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .stat-card .number {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }
        .detail-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .detail-card h3 {
            color: #333;
            margin-top: 0;
        }
        .detail-card p {
            margin: 10px 0;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>📊 Estadísticas Globales</h1>
        <div>
            <a href="{{ route('admin.frases.index') }}" class="btn btn-secondary">Administrar Frases</a>
            <a href="{{ route('galleta.mostrar') }}" class="btn btn-primary">Volver a la Galleta</a>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total de Frases</h3>
            <p class="number">{{ $totalFrases }}</p>
        </div>

        <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <h3>Total de Usuarios</h3>
            <p class="number">{{ $totalUsuarios }}</p>
        </div>

        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <h3>Galletas Abiertas</h3>
            <p class="number">{{ $totalVistas }}</p>
        </div>
    </div>

    <div class="detail-card">
        <h3>🏆 Top 5 Frases Más Vistas</h3>
        @if($top5Frases->count() > 0)
            <ol style="margin-left: 20px;">
                @foreach($top5Frases as $item)
                    <li style="margin-bottom: 15px;">
                        <strong>{{ $item->frase->mensaje }}</strong>
                        <br>
                        <small style="color: #666;">Vistas: {{ $item->total }} veces</small>
                    </li>
                @endforeach
            </ol>
        @else
            <p>No hay datos disponibles</p>
        @endif
    </div>

    <div class="detail-card">
        <h3>👤 Usuario Más Activo</h3>
        @if($usuarioMasActivo)
            <p><strong>{{ $usuarioMasActivo->user->name }}</strong> ({{ $usuarioMasActivo->user->email }})</p>
            <p>Galletas abiertas: {{ $usuarioMasActivo->total }}</p>
        @else
            <p>No hay datos disponibles</p>
        @endif
    </div>
</div>
</body>
</html>

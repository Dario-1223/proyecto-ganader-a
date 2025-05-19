<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte GanaSys</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .title { font-size: 24px; font-weight: bold; color: #047857; }
        .subtitle { font-size: 16px; color: #6b7280; margin-top: 5px; }
        .info-container { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .info-box { border: 1px solid #e5e7eb; padding: 15px; border-radius: 8px; width: 30%; }
        .info-label { font-weight: bold; color: #374151; margin-bottom: 5px; }
        .content { margin-top: 30px; }
        .section-title { font-size: 18px; color: #047857; margin-bottom: 10px; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #9ca3af; }
        .separator { border-top: 1px solid #e5e7eb; margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { background-color: #f3f4f6; text-align: left; padding: 8px; }
        td { padding: 8px; border-bottom: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Sistema GanaSys</div>
        <div class="subtitle">Reporte de Tratamientos</div>
    </div>
    
    <div class="info-container">
        <div class="info-box">
            <div class="info-label">Ganadero:</div>
            <div>{{ $reporte->nombre_ganadero }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Gestor:</div>
            <div>{{ $reporte->nombre_gestor }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Fecha Generación:</div>
            <div>{{ $reporte->fecha_generacion }}</div>
        </div>
    </div>
    
    <div class="separator"></div>
    
    <div class="content">
        <h3 class="section-title">Detalles del Reporte</h3>
        <p><strong>ID Reporte:</strong> {{ $reporte->id_reporte }}</p>
        <p><strong>Fecha del Reporte:</strong> {{ \Carbon\Carbon::parse($reporte->fecha_reporte)->format('d/m/Y') }}</p>
        <p><strong>Descripción:</strong></p>
        <p style="margin-left: 20px;">{{ $reporte->descripcion }}</p>
        
        
    </div>
    
    <div class="footer">
        Documento generado automáticamente por el sistema GanaSys - {{ date('Y') }}
    </div>
</body>
</html>
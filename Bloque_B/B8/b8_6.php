<?php 
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenemos la fecha del inicio del evento
    $fecha_inicio_str = $_POST['fecha_inicio'];

    // En que zona horaria es el evento
    $zona_horaria_origen = $_POST['zona_horaria'];

    // Lista de zonas horarias disponibles 
    $zonas_disponibles = [
        'NY' => 'America/New_York',
        'TK' => 'Asia/Tokyo',
        'ES' => 'Europe/Madrid'
    ];

    // Validamos la fecha (que este seleccionada) y la convertimos 
    if (!empty($fecha_inicio_str) && isset($zonas_disponibles[$zona_horaria_origen])) {

        // Crear la fecha del evento con la zona horaria seleccionada
        $fecha_inicio = new DateTime($fecha_inicio_str, new DateTimeZone($zonas_disponibles[$zona_horaria_origen]));

        // Definir las zonas horarias para conversión
        $zonas = [
            'New York' => new DateTimeZone('America/New_York'),
            'Tokio' => new DateTimeZone('Asia/Tokyo')
        ];

        // Crear eventos recurrentes (cada 7 días durante 2 meses)
        $intervalo = new DateInterval('P7D'); 
        $fecha_fin = clone $fecha_inicio;
        $fecha_fin->modify('+2 months'); 
        $periodo = new DatePeriod($fecha_inicio, $intervalo, $fecha_fin);

        $mensaje = "<h2>Eventos Generados</h2>";

        // Bucle para recorrerlo
        foreach ($periodo as $evento) {
            $mensaje .= "<h3>Fecha Original: {$evento->format('Y-m-d H:i:s')} ({$zonas_disponibles[$zona_horaria_origen]})</h3>";

            // Convertimos a otras zonas horarias
            foreach ($zonas as $ciudad => $zona) {
                $evento_convertido = clone $evento;
                $evento_convertido->setTimezone($zona);
                $info_zona = obtener_info_zona($zona, $evento_convertido);

                $mensaje .= "<h4>Conversión a $ciudad:</h4>";
                $mensaje .= "<p><b>Fecha:</b> {$evento_convertido->format('Y-m-d H:i:s')}</p>";
                $mensaje .= "<p><b>Zona Horaria:</b> {$info_zona['nombre']} ({$info_zona['ubicacion']})</p>";
                $mensaje .= "<p><b>UTC Offset:</b> {$info_zona['offset']} horas</p>";
                $mensaje .= "<p><b>Horario de Verano:</b> {$info_zona['horario_verano']}</p>";
                $mensaje .= "<hr>";
            }
        }
    } else {
        $mensaje = "<p style='color: red;'>Error: Introduce una fecha válida y selecciona una zona horaria.</p>";
    }
}

// Función para obtener información de la zona horaria
function obtener_info_zona($zona, $fecha) {
    $tz = new DateTimeZone($zona->getName());
    $transiciones = $tz->getTransitions($fecha->getTimestamp(), $fecha->getTimestamp());
    $offset = $tz->getOffset($fecha) / 3600; // Convertir a horas

    // Ubicación geográfica (solo para Nueva York y Tokio)
    $ubicaciones = [
        'America/New_York' => 'Estados Unidos, Costa Este',
        'Asia/Tokyo' => 'Japón, Asia Oriental',
    ];

    return [
        'nombre' => $tz->getName(),
        'ubicacion' => $ubicaciones[$tz->getName()] ?? 'Desconocida',
        'offset' => $offset,
        'horario_verano' => $transiciones[0]['isdst'] ? 'Sí' : 'No'
    ];
}
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>
<h1>Fecha del evento</h1>
<form action="b8_6.php" method="POST">
    <label for="fecha_inicio">Introduce la fecha y hora del inicio del evento (AAAA-MM-DD HH:MM:SS):</label>
    <input type="text" name="fecha_inicio" id="fecha_inicio" required><br><br>

    <label for="zona_horaria">Zona horaria del evento:</label>
    <select name="zona_horaria" id="zona_horaria" required>
        <option value="">Seleccione uno</option>
        <option value="NY">New York</option>
        <option value="TK">Tokio</option>
        <option value="ES">España</option> <!-- España solo para origen -->
    </select><br><br>
    <input type="submit" value="Generar eventos">
</form>

<!-- Mostrar resultados -->
<?= $mensaje; ?>

<?php include './includes/footer.php'; ?>

<!-- eventos recurrentes cada semana durante 2 meses 
    Crear un evento inicial con fecha dada 
    Definir un intervalo de repeticion como cada semana o 15 dias 
    Generar y mostrar todas las fechas futuras del evento durante un periodo determinado(proximos 2 meses) 
    Mostrar duracion del evento  -->

    <!-- En la pagina 70 es donde encontramos lo de P1D(intervalo) para el date interval -->
    <!-- Pagina 90  -->
<?php
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_inicio_str = $_POST['fecha_inicio'];
    $fecha_final_str = $_POST['fecha_final'];
    // $intervalo_dias = $_POST['intervalo']; // Opción seleccionada (7 o 15 días)

    // Validar formato de fecha
    $fecha_inicio = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_inicio_str);
    $fecha_final = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_final_str);
    

    if ($fecha_inicio && $fecha_final) {
        // Crear intervalo 7 dias
        $interval = new DateInterval("P7D");
        $periodo = new DatePeriod($fecha_inicio, $interval, $fecha_final);

        // Calcular duración total
        $duracion = $fecha_inicio->diff($fecha_final);
        $mensaje .= "<p><b>Duración total:</b> {$duracion->days} días, {$duracion->h} horas, {$duracion->i} minutos, {$duracion->s} segundos.</p>";

        // Generar lista de eventos
        $mensaje .= "<h3>Eventos programados:</h3>";
        foreach ($periodo as $evento) {
            $mensaje .= "<p><b>" . $evento->format('l') . "</b><br>" . $evento->format('M j, Y H:i') . "</p>";
        }
    } else {
        $mensaje = "<p style='color:red;'>Formato de fecha incorrecto. Usa AAAA-MM-DD HH:MM:SS</p>";
    }
}

?>
    <!-- HTML -->
<?php include './includes/header.php'; ?>
<h1>Fecha del evento</h1>
<form action="b8_5.php" method="POST">
    <label for="fecha_inicio">Introduce la fecha y hora del inicio del evento (AAAA-MM-DD HH:MM:SS):</label>
    <input type="text" name="fecha_inicio" id="fecha_inicio"><br><br>

    <label for="fecha_final">Introduce la fecha final del evento (AAAA-MM-DD HH:MM:SS):</label>
    <input type="text" name="fecha_final" id="fecha_final"><br><br>

    <input type="submit" value="Generar eventos">
</form>

<!-- Mostrar resultados -->
<?= $mensaje; ?>

<?php include './includes/footer.php'; ?>

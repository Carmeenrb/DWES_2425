<!-- Pagina 78 -->
<?php
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];

    // Convertilo a fecha
    $fecha_inicio = date_create_from_format('Y-m-d H:i:s', $fecha_inicio);
    $fecha_final = date_create_from_format('Y-m-d H:i:s', $fecha_final);

    //verificamos que las fechas se han convertido en datetime
    if ($fecha_inicio && $fecha_final) {

        // 2. el sistema debe calcular la duracion total entre ambas fechas con dateInterval
        $intervalo = $fecha_inicio->diff($fecha_final);

        // 3. Formatear la duracion en X dias, horas y minutos
        $duracionFormateada = $intervalo->format('%d días, %h horas, %i minutos');

        // 4. Calcular el total de horas y minutos
        $totalHoras = ($intervalo->days * 24) + $intervalo->h;
        $totalMinutos = $intervalo->i;

        // mostrar
        $mensaje = '<p><b>Duracion del evento: </b>' . $duracionFormateada . '<br>';
        $mensaje .= '<p><b>Tiempo total: </b>' . $totalHoras . ' ' . $totalMinutos . ' Minutos ' . '<br>';
    } else {
        $mensaje = 'Error en la conversion de las fechas';
    }
}
?>
<!-- HTML -->
<?php include './includes/header.php' ?>
<h1>Fecha del evento</h1>
<form action="b8_4.php" method="POST">
    <label for="fecha_inicio">Introduce una fecha de inicio en formato año-mes-dia h:m:s</label>
    <input type="text" name="fecha_inicio" id="fecha_inicio"><br><br>
    <!-- fecha de final del evento -->
    <label for="fecha_final">Introduce una fecha de final en formato año-mes-dia h:m:s</label>
    <input type="text" name="fecha_final" id="fecha_final"><br>
    <input type="submit" value="Enviar">
</form>
<!-- Mostrar resultados -->
<?= $mensaje ?>


<?php include './includes/footer.php' ?>
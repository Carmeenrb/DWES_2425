<!-- Pagina 65 -->
<?php
// Definir la fecha inicial del evento
$fecha_inicial = new DateTime('2024-10-16 15:30:00');

// Hago una copia de la fecha inicial
$fecha_modificada = clone $fecha_inicial;

// Cambiar la fecha a 10 de febrero de 2025
$fecha_modificada->setDate(2025, 2, 10);

// Cambiar la hora a las 15:30:00
$fecha_modificada->setTime(15, 30, 0);

// Ajustar la fecha del evento a partir de un timestamp UNIX
// 12/01/2023 15:30:00 UTC
$fecha_modificada->setTimestamp($fecha_inicial->getTimestamp());

// Modificar la fecha sumando 1 día
$fecha_modificada->modify('+10 day');

// Formatear la fecha para mostrarla
// $mensaje = "Nueva fecha del evento: " . $fecha_modificada->format('d/m/Y H:i:s');
?>

<!-- HTML -->
<?php include './includes/header.php' ?>
<!-- Actualizar la fecha del evento -->
<h1>Actualizar fecha del evento</h1>
<p><b>Fecha del evento antiguo:</b> <?= $fecha_inicial->format('d/m/Y H:i:s'); ?></p>
<p><b>Fecha del evento actual:</b> <?= $fecha_modificada->format('d/m/Y H:i:s'); ?></p>
<!-- mostrar el mensaje -->
<?php include './includes/footer.php' ?>
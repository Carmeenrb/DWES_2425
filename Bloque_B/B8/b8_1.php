<!-- pagina 41 -->
<?php 
// 1. FECHA ACTUL DEL SISTEMA: con time() y formatearla con date()
$fecha_time = time();
$fecha_time_n= new DateTime(); // fecha actual para trabajar conella con el diff
$fecha_time_formateada= date('l,d M Y',$fecha_time);

// 2. FECHA DEL EVENTO: inicion srtotime(), final mktime
$fechaI_totime= strtotime('2025-02-8');
$fechaI_totime_formateada= date('l,d M Y',$fechaI_totime);

// Esto sirve para trabajar con el diff
$fecha_ini_DT= new DateTime('@'.$fechaI_totime);


// final
$fechaF_mk= mktime(00,00,00,2,10,2025);
$fechaF_mk_formateada= date('l,d M Y',$fechaF_mk);

// Sirve para trabajar con el diff
$fecha_fin_DT= new DateTime('@' . $fechaF_mk);


// 3. MOSTRAR CUENTA REGRESIVA: dias que faltan para el inicio del evento y dias para que termine el evento
$tiempo_inicio_evento = $fecha_time_n ->diff($fecha_ini_DT);
$tiempo_fin_evento = $fecha_time_n ->diff($fecha_fin_DT);


// 4. MENSAJES CONDICIONALES: 
if ($fecha_time < $fechaI_totime) {
    $mensaje_evento = "El evento comenzará en " . $tiempo_inicio_evento->format('%a') . " días.";
} elseif ($fecha_time >= $fechaI_totime && $fecha_time <= $fechaF_mk) {
    $mensaje_evento = "El evento está en curso.";
} else {
    $mensaje_evento = "El evento ha finalizado.";
}


?>
<!-- html -->
<?php include './includes/header.php' ?>

<p><b>Fecha Actual con time(): </b><?= $fecha_time_formateada?></p><br>
<p><b>Fecha Inicio del evento con strtotime(): </b><?= $fechaI_totime_formateada?></p><br>
<p><b>Fecha Final del evento con mktime(): </b><?= $fechaF_mk_formateada?></p><br>
<p><b>Dias que quedan para el inicio del evento: </b><?= $tiempo_inicio_evento->format('%R%a days');?></p><br>
<p><b>Dias que quedan para el final del evento: </b><?= $tiempo_fin_evento->format('%R%a days');?></p><br>
<br>
<h2>Mensajes Condicionales</h2>
<p><?= $mensaje_evento?></p>

<?php include './includes/footer.php' ?>
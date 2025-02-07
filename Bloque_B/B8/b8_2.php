<!-- Pagina 55 -->
<?php 
// 1. FECHA ACTUAL DEL SISTEMA: con time() y formatearla con date()
$mensaje='';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fecha = $_POST['fecha'];

    // 2. el sistema debe convertir esta fecha en datetime y tilizando date_create_from_format
    // $fecha_1 = new DateTime($fecha);
    $fecha = date_create_from_format('Y-m-d H:i:s', $fecha);

    // 3. una vez creado el objeto:
    // $fecha_formato= $fecha->getTimestamp();

    // - mostrar la fecha en formato y-m-d
        $mensaje = '<p><b>Fecha en formato en y-m-d: </b>' . $fecha->format('Y-m-d H:i:s') . '<br>';
        $mensaje .= '<p><b>Fecha en formato en timetamp: </b>' . $fecha->getTimestamp() . '<br>';
        $mensaje .= '<p><b>Fecha en formato legible: </b>' . $fecha->format('d \d\e F \d\e Y, H:i') . '<br>';
    // - obtener el timestamp UNIX corrspondiente a esa fecha usando el metodo getTimestamp()
        
    // - mostrar la fecha en formato '6 febrero de 2025,10:30'
}
?>
<!-- HTML -->
<?php include './includes/header.php' ?>
<h2>Introduce una fecha</h2>
<form action="b8_2.php" method="POST">
    <label for="fecha">Introduce una fecha en formato año-mes-dia h:m:s</label>
    <input type="text" name="fecha" id="fecha">
    <input type="submit" value="Enviar">
</form>

<!-- mensaje de fecha -->
<p><?= $mensaje?></p>
<?php include './includes/footer.php' ?>
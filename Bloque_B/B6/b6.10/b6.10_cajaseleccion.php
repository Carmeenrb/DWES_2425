<!-- pagina 166 -->
<?php 
// Variables
$sms='';
$asignatura='';
$optativas=['Matemáticas', 'Física', 'Historia','Arte'];
$valido= false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $asignatura = $_POST['asignatura'] ?? '';

    if(in_array($asignatura,$optativas)){
        // $sms='Gracias por la seleccion';
        $valido= true;
        // Redirigir a una página de confirmación
        header('Location: b6.10_guardado.php');
        exit;  // Es importante llamar a exit para evitar que el script continúe ejecutándose
    }else{
        $sms='Seleccione una opcion';
        $valido=false;
    }
    // $valido = in_array($asignatura,$optativas);
    // $sms = $valido ? 'Gracias por la seleccion' : 'Seleccione una opcion';
}
?>
<!-- Actividad 10  -->
<?php include '../includes/header.php' ?>
    <h1>Seleccione una de estas asignaturas optativas</h1>
    <!-- Mostrar mensaje de retroalimentación -->
    <p style="color:<?= ($sms && $valido) ? 'green' : 'red'; ?>"><?= $sms; ?></p>
    
    <form action="b6.10_guardado.php" method="POST">
        <p>Selecciona una Asignatura:</p>
        <!-- Caja de seleccion -->
        <select name="asignatura" id="asignatura">
        <option value="">Seleccione una asignatura</option>
            <?php foreach ($optativas as $opcion) { ?>
                <option value="<?= htmlspecialchars($opcion) ?>" 
                <?= ($asignatura === $opcion) ? 'selected' : '' ?>><?= $opcion ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Guardar">

    </form>
<?php include '../includes/footer.php' ?>
<!-- pagina 176 -->
<?php 
// Lista de eventos disponibles
$eventos=['Ceremonia de apertura','Atletismo','Natacion','Ciclismo','Ceremonia de Clausura'];

// Variables para comprobar errores y confirmaciones
$errores=[];
$confirmacion = '';

// Comprobar si se ha enviado correctamente
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Obtener los eventos seleccionados
    $evento_seleccionado = $_POST['eventos'] ?? [];

    // Validar si se ha seleccionado un evento
    if(empty($evento_seleccionado)){
        $errores[]='Debe de seleccionar un evento';
    }
    // Si no existen errores que salga un sms de todo bien
    if(empty($errores)){
        $confirmacion= 'Gracias por participar';
    }
}
?>
<?php include '../includes/header.php' ?>
<h1>Actividad 11</h1>
<h1>Inscripcion de voluntarios para las olimpiadas</h1>

<form action="b6.11_voluntarios.php" method="POST">
    <p>Selecciona los eventos en los que deseas participar:</p>
    <?php foreach ($eventos as $evento){ ?>
        <label>
            <input type="checkbox" name="eventos[]" value="<?= htmlspecialchars($evento) ?>">
            <?= htmlspecialchars($evento) ?>
        </label><br>
    <?php } ?>
    <button type="submit">Enviar</button>
</form>
<!-- Si existe algun error -->
<?php if (!empty($errores)){ ?>
    <div style="color: red;">
        <h3>Errores:</h3>
        <ul>
            <?php foreach ($errores as $error){ ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>
<!-- Mensaje de confirmacion -->
<?php if (!empty($confirmacion)){ ?>
    <div style="color: green;">
        <h3>Confirmación:</h3>
        <!-- Muestra el sms -->
        <p><?= htmlspecialchars($confirmacion) ?></p>
    </div>
<?php }?>
<?php include '../includes/footer.php' ?>
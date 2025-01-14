<!-- pagina 197 -->
<?php
// Creacion de arrays
$usuario = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'check' => '',
];
$error = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'check' => false,
];

// Validar que el formulario este correcto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario['nombre'] = $_POST['nombre'];
    $usuario['edad'] = $_POST['edad'];
    $usuario['correo'] = $_POST['correo'];
    $usuario['check'] = (isset($_POST[$user]) && $_POST[$user] == 'on') ? true : false;

    // Errores
    $error['nombre'] = is_text($usuario['nombre'], 2, 20) ? '' : 'Debe de tener entre 2 y 20 caracteres';
    $error['edad'] = is_number($usuario['edad'], 16, 50) ? '' : 'Debe de tener entre 16 y 50 años';
    $error['check'] = $usuario['check'] ? '' : 'Debe de aceptar los terminos y condiciones';

    // Verificar si existen errores

    $invalid = implode($error);
    if ($invalid) {
        $sms = 'Por favor corrige los errores';

    } else {
        $sms = 'Es valido';
    }
    // Funciones para validar texto y num
    function is_text($str, $min, $max)
    {
        return strlen($str) >= $min && strlen($str) <= $max;
    }

    function is_number($num, $min, $max)
    {
        return is_numeric($num) && $num >= $min && $num <= $max;
    }


}


?>
<?php include '../includes/header.php' ?>
<!-- Actividad 12 -->
<h1>Formulario de Registro</h1>
<form action="b6.12.php" method="POST">
    Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>">
    <span class="error"><?= $error['nombre'] ?></span><br>

    Edad: <input type="text" name="edad" value="<?= htmlspecialchars($usuario['edad']) ?>">
    <span class="error"><?= $error['edad'] ?></span><br>

    Correo: <input type="text" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>">
    <span class="error"><?= $error['correo'] ?></span><br>

    <!-- Confirmacion de consentimiento -->
    Aceptar las condiciones <input type="checkbox" name="check" value="<?= htmlspecialchars($usuario['check']) ?>"
        <?= $usuario['check'] ? 'checked' : '' ?>>
    <span class="error"><?= $error['check'] ?></span><br>

    <button type="submit">Enviar</button>
</form>
<!-- Si existe algun error -->
<?php if (!empty($errores)) { ?>
    <div style="color: red;">
        <h3><?= htmlspecialchars($error) ?></h3>
    </div>
<?php } ?>

<?php include '../includes/footer.php' ?>
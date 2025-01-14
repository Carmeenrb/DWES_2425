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
$sms_confirmacion='';

// Validar que el formulario este correcto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario['nombre'] = $_POST['nombre'];
    $usuario['edad'] = $_POST['edad'];
    $usuario['correo'] = $_POST['correo'];
    $usuario['check'] = (isset($_POST['check']) && $_POST['check'] === 'true') ? true : false;

    // Errores
    $error['nombre'] = is_text($usuario['nombre'], 2, 20) ? '' : 'Debe de tener entre 2 y 20 caracteres';
    $error['edad'] = is_number($usuario['edad'], 16, 50) ? '' : 'Debe de tener entre 16 y 50 años';
    $error['check'] = $usuario['check'] ? '' : 'Debe de aceptar los terminos y condiciones';

    // Verificar si existen errores(te convierte un array en un string(si tiene un error lo muestra))

    $invalid = implode($error);
    if ($invalid) {
        $sms = 'Por favor corrige los errores';

    } else {
        $sms = '¡Formulario válido! Gracias por aceptar los términos y condiciones.';
    }
    
    // // Verificar si existen errores
    // $invalid = implode('', $error);
    // if ($invalid) {
    //     $sms = 'Por favor corrige los errores';
    // } else {
    //     $sms = '¡Formulario válido! Gracias por aceptar los términos y condiciones.';
    // }
    

}
// Funciones para validar texto y num
function is_text($name, $min, $max)
    {
        return strlen($name) >= $min && strlen($name) <= $max;
    }

    function is_number($num, $min, $max)
    {
        return is_numeric($num) && $num >= $min && $num <= $max;
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
    Aceptar las condiciones <input type="checkbox" name="check" value="true"<?= $usuario['check'] ? 'checked' : '' ?>>
    <span class="error"><?= $error['check'] ?></span><br>

    <button type="submit">Enviar</button>
</form>
<!-- Si existe algun error -->
<?php if (!empty($sms)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($sms) ?></h3>
    </div>
<?php } ?>

<?php include '../includes/footer.php' ?>
<?php 
// Array para los datos del formulario
$usuario = [
    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'edad' => '',
    'contrasenia' => '',
    'evento' => '',
    'check' => false,
];
$error = [
    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'edad' => '',
    'contrasenia' => '',
    'evento' => '',
    'check' => '',
];

// Verificar que el formulario fue enviado
if (isset($_GET['submit'])) {
    // Recuperar datos y saneamiento
    $usuario['nombre'] = htmlspecialchars($_GET['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
    $usuario['apellido'] = htmlspecialchars($_GET['apellido'] ?? '', ENT_QUOTES, 'UTF-8');
    $usuario['correo'] = htmlspecialchars($_GET['correo'] ?? '', ENT_QUOTES, 'UTF-8');
    $usuario['edad'] = htmlspecialchars($_GET['edad'] ?? '', ENT_QUOTES, 'UTF-8');
    $usuario['contrasenia'] = htmlspecialchars($_GET['contrasenia'] ?? '', ENT_QUOTES, 'UTF-8');
    $usuario['check'] = isset($_GET['check']);

    // Validar los datos
    $error['nombre'] = empty($usuario['nombre']) ? 'El nombre es obligatorio.' : (validarTxt($usuario['nombre'], 2, 20) ? '' : 'El nombre debe tener entre 2 y 20 caracteres.');
    $error['apellido'] = empty($usuario['apellido']) ? 'El apellido es obligatorio.' : (validarTxt($usuario['apellido'], 2, 50) ? '' : 'El apellido debe tener entre 2 y 50 caracteres.');
    $error['correo'] = empty($usuario['correo']) ? 'El correo es obligatorio.' : (validarCorreo($usuario['correo']) ? '' : 'El correo es incorrecto.');
    $error['edad'] = empty($usuario['edad']) ? 'La edad es obligatoria.' : (validarEdad($usuario['edad'], 16, 50) ? '' : 'La edad debe estar entre 16 y 50.');
    $error['contrasenia'] = empty($usuario['contrasenia']) ? 'La contraseña es obligatoria.' : (validarContra($usuario['contrasenia']) ? '' : 'La contraseña debe tener al menos 8 caracteres, incluir letras y números.');
    $error['check'] = $usuario['check'] ? '' : 'Debe aceptar los términos y condiciones.';

    // Comprobar si hay errores
    $invalid = array_filter($error); // Filtra solo los errores
    $sms = $invalid ? 'Por favor corrige los errores' : '¡Formulario válido! Gracias por aceptar los términos y condiciones.';
}

// FUNCIONES
function validarTxt($dato, $min = 0, $max = 50) {
    return strlen($dato) >= $min && strlen($dato) <= $max;
}

function validarCorreo($correo) {
    return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $correo);
}

function validarEdad($edad, $min = 16, $max = 50) {
    return is_numeric($edad) && $edad >= $min && $edad <= $max;
}

function validarContra($contrasenia) {
    return mb_strlen($contrasenia) >= 8 &&
           preg_match('/[A-z]/', $contrasenia) &&
           preg_match('/[0-9]/', $contrasenia);
}
?>

<?php include '../includes/header.php' ?>
<h1>Formulario de Registro</h1>

<form action="probando.php" method="GET">
    Nombre: <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>">
    <span class="error"><?= $error['nombre'] ?></span><br>

    Apellidos: <input type="text" name="apellido" value="<?= $usuario['apellido'] ?>">
    <span class="error"><?= $error['apellido'] ?></span><br>

    Correo: <input type="text" name="correo" value="<?= $usuario['correo'] ?>">
    <span class="error"><?= $error['correo'] ?></span><br>

    Edad: <input type="text" name="edad" value="<?= $usuario['edad'] ?>">
    <span class="error"><?= $error['edad'] ?></span><br>

    Contraseña: <input type="text" name="contrasenia" value="<?= $usuario['contrasenia'] ?>">
    <span class="error"><?= $error['contrasenia'] ?></span><br>

    Aceptar las condiciones <input type="checkbox" name="check" value="true" <?= $usuario['check'] ? 'checked' : '' ?>>
    <span class="error"><?= $error['check'] ?></span><br>

    <button type="submit" name="submit">Enviar</button>
</form>

<?php if (!empty($sms)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($sms) ?></h3>
    </div>
<?php } ?>
<?php include '../includes/footer.php' ?>

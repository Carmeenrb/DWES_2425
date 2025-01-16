<?php 
// Inicialización de arrays
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
    // Recoger datos del formulario
    $usuario['nombre'] = isset($_GET['nombre']) ? trim($_GET['nombre']) : '';
    $usuario['apellido'] = isset($_GET['apellido']) ? trim($_GET['apellido']) : '';
    $usuario['correo'] = isset($_GET['correo']) ? trim($_GET['correo']) : '';
    $usuario['edad'] = isset($_GET['edad']) ? trim($_GET['edad']) : '';
    $usuario['contrasenia'] = isset($_GET['contrasenia']) ? trim($_GET['contrasenia']) : '';
    $usuario['evento'] = isset($_GET['evento']) ? trim($_GET['evento']) : '';
    $usuario['check'] = isset($_GET['check']) && $_GET['check'] === 'true';

    // Validar los datos y generar errores
    $error['nombre'] = empty($usuario['nombre']) || !validarTxt($usuario['nombre'], 2, 20) 
        ? 'El nombre debe tener entre 2 y 20 caracteres.' : '';
    $error['apellido'] = empty($usuario['apellido']) || !validarTxt($usuario['apellido'], 2, 50) 
        ? 'El apellido debe tener entre 2 y 50 caracteres.' : '';
    $error['correo'] = empty($usuario['correo']) || !validarCorreo($usuario['correo']) 
        ? 'El correo es incorrecto o está vacío.' : '';
    $error['edad'] = empty($usuario['edad']) || !validarEdad($usuario['edad'], 16, 50) 
        ? 'La edad debe estar entre 16 y 50 años.' : '';
    $error['contrasenia'] = empty($usuario['contrasenia']) || !validarContra($usuario['contrasenia']) 
        ? 'La contraseña debe tener al menos 8 caracteres, incluir letras y números.' : '';
    $error['check'] = !$usuario['check'] 
        ? 'Debe aceptar los términos y condiciones.' : '';

    // Verificar si hay errores
    $invalid = implode('', $error);
    $sms = $invalid ? 'Por favor corrige los errores.' : '¡Formulario válido! Gracias por aceptar los términos y condiciones.';

    // Saneamiento de datos para mostrar en la vista
    $usuario['nombre'] = htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8');
    $usuario['apellido'] = htmlspecialchars($usuario['apellido'], ENT_QUOTES, 'UTF-8');
    $usuario['correo'] = htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8');
    $usuario['edad'] = htmlspecialchars($usuario['edad'], ENT_QUOTES, 'UTF-8');
    $usuario['contrasenia'] = htmlspecialchars($usuario['contrasenia'], ENT_QUOTES, 'UTF-8');
}
    
// Funciones de validación
function validarTxt($dato, $min = 0, $max = 50) {
    return strlen(trim($dato)) >= $min && strlen(trim($dato)) <= $max;
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
    Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre'] ?? '', ENT_QUOTES) ?>">
    <span class="error"><?= $error['nombre'] ?></span><br>

    Apellidos: <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido'] ?? '', ENT_QUOTES) ?>">
    <span class="error"><?= $error['apellido'] ?></span><br>

    Correo: <input type="text" name="correo" value="<?= htmlspecialchars($usuario['correo'] ?? '', ENT_QUOTES) ?>">
    <span class="error"><?= $error['correo'] ?></span><br>

    Edad: <input type="text" name="edad" value="<?= htmlspecialchars($usuario['edad'] ?? '', ENT_QUOTES) ?>">
    <span class="error"><?= $error['edad'] ?></span><br>

    Contraseña: <input type="text" name="contrasenia" value="<?= htmlspecialchars($usuario['contrasenia'] ?? '', ENT_QUOTES) ?>">
    <span class="error"><?= $error['contrasenia'] ?></span><br>

    Aceptar las condiciones: <input type="checkbox" name="check" value="true" <?= $usuario['check'] ? 'checked' : '' ?>>
    <span class="error"><?= $error['check'] ?></span><br>

    <button type="submit" name="submit">Enviar</button>
</form>

<!-- Mensajes -->
<?php if (!empty($sms)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($sms) ?></h3>
    </div>
<?php } ?>
<?php include '../includes/footer.php' ?>

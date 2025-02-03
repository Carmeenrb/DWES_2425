<?php
// Inicializar variables antes de la validación
$usuario = [
    'nombre' => '',
    'correo' => '',
    'edad' => '',
    'evento' => '',
    'check' => false,
];

$error = [
    'nombre' => '',
    'correo' => '',
    'edad' => '',
    'evento' => '',
    'check' => '',
];

$datos = [
    'nombre' => '',
    'correo' => '',
    'edad' => '',
    'evento' => '',
    'check' => '',
];

// Si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener valores del formulario
    $usuario['nombre'] = $_POST['nombre'] ?? '';
    $usuario['correo'] = $_POST['correo'] ?? '';
    $usuario['edad'] = $_POST['edad'] ?? '';
    $usuario['evento'] = $_POST['evento'] ?? '';
    $usuario['check'] = isset($_POST['check']) && $_POST['check'] === 'true';

    // Validaciones
    $error['nombre'] = validarTxt($usuario['nombre'], 2, 50) ? '' : 'El nombre debe tener entre 2 y 50 caracteres.';
    $error['correo'] = validarCorreo($usuario['correo']) ? '' : 'El correo es incorrecto.';
    $error['edad'] = validarEdad($usuario['edad'], 16, 50) ? '' : 'La edad debe estar entre 16 y 50.';

    // Validación del select
    $opcionesValidas = ['fisico', 'digital'];
    $error['evento'] = in_array($usuario['evento'], $opcionesValidas) ? '' : 'Debe seleccionar una opción válida.';

    $error['check'] = $usuario['check'] ? '' : 'Debe aceptar los términos y condiciones.';

    // Verificar si hay errores
    $invalid = array_filter($error); // Si hay algún error, el array no estará vacío.

    if ($invalid) {
        $sms = '❌ Por favor corrige los errores.';
    } else {
        $sms = '✅ ¡Formulario válido! Gracias por aceptar los términos y condiciones.';

        // Saneamiento
        $datos['nombre'] = htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8');
        $datos['correo'] = htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8');
        $datos['edad'] = htmlspecialchars($usuario['edad'], ENT_QUOTES, 'UTF-8');
        $datos['evento'] = htmlspecialchars($usuario['evento'], ENT_QUOTES, 'UTF-8');
        $datos['check'] = $usuario['check'] ? 'Sí' : 'No';
    }
}

// FUNCIONES DE VALIDACIÓN
function validarTxt($dato, $min = 2, $max = 50) {
    return strlen(trim($dato)) >= $min && strlen(trim($dato)) <= $max;
}

function validarCorreo($correo) {
    return filter_var($correo, FILTER_VALIDATE_EMAIL);
}

function validarEdad($edad, $min = 16, $max = 50) {
    return filter_var($edad, FILTER_VALIDATE_INT, ["options" => ["min_range" => $min, "max_range" => $max]]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Biblioteca Baena B</h1>
    <h1>Formulario de Registro</h1>
    
    <form action="" method="POST">
        <label>Nombre Completo:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
        <span style="color: red;"><?= $error['nombre'] ?></span>
        <br><br>

        <label>Correo:</label>
        <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
        <span style="color: red;"><?= $error['correo'] ?></span>
        <br><br>

        <label>Edad:</label>
        <input type="number" name="edad" value="<?= htmlspecialchars($usuario['edad']) ?>" required>
        <span style="color: red;"><?= $error['edad'] ?></span>
        <br><br>

        <label>Tipo de libro favorito:</label> <br>
        <select name="evento">
            <option value="">Seleccione una opción</option>
            <option value="fisico" <?= ($usuario['evento'] === 'fisico') ? 'selected' : '' ?>>Físico</option>
            <option value="digital" <?= ($usuario['evento'] === 'digital') ? 'selected' : '' ?>>Digital</option>
        </select>
        <span style="color: red;"><?= $error['evento'] ?></span>
        <br><br>

        <label>
            <input type="checkbox" name="check" value="true" <?= $usuario['check'] ? 'checked' : '' ?>>
            Acepto los términos y condiciones
        </label>
        <span style="color: red;"><?= $error['check'] ?></span>
        <br><br>

        <input type="submit" name="sent" value="Enviar">
    </form>

    <?php if (!empty($sms)): ?>
        <div style="color: <?= $invalid ? 'red' : 'green'; ?>;">
            <h3><?= htmlspecialchars($sms) ?></h3>
        </div>
    <?php endif; ?>
</body>
</html>

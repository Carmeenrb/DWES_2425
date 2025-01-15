<?php
// Inicializamos los arrays
$usuario = [
    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'check' => '',
];

$error = [
    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'check' => '',
];
$datos = [];
$sms = '';

// Verificar si el formulario fue enviado
if (isset($_GET['submitted'])) {
    // Configurar filtros
    $filters['nombre']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['nombre']['options']['regexp'] = '/[A-z]{2,50}/';
    $filters['apellido']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['apellido']['options']['regexp'] = '/[A-z]{2,50}/';
    $filters['correo'] = FILTER_VALIDATE_EMAIL;
    $filters['telefono']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['telefono']['options']['regexp'] = '/[0-9]{9}/';
    $filters['evento']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['evento']['options']['regexp'] = '/^(presencial|online)$/';
    $filters['check']['filter'] = FILTER_VALIDATE_BOOLEAN;
    $filters['check']['flags'] = FILTER_NULL_ON_FAILURE;

    // Validar entradas
    $usuario = filter_input_array(INPUT_GET, $filters);

    // Validar errores
    $error['nombre'] = $usuario['nombre'] ? '' : 'Debe escribir un nombre';
    $error['apellido'] = $usuario['apellido'] ? '' : 'Debe escribir los apellidos';
    $error['correo'] = $usuario['correo'] ? '' : 'El correo no es válido';
    $error['telefono'] = $usuario['telefono'] ? '' : 'El teléfono no es correcto';
    $error['evento'] = $usuario['evento'] ? '' : 'Debe seleccionar un evento';
    $error['check'] = $usuario['check'] ? '' : 'Debe aceptar las condiciones de uso';

    // Revisar si hay errores
    $invalid = implode($error);
    if ($invalid) {
        $sms = 'Por favor, corrige los errores';
    } else {
        $sms = '¡Gracias! Los datos son correctos.';
        // Saneamiento
        $datos['nombre'] = filter_var($usuario['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $datos['apellido'] = filter_var($usuario['apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $datos['correo'] = filter_var($usuario['correo'], FILTER_SANITIZE_EMAIL);
        $datos['telefono'] = filter_var($usuario['telefono'], FILTER_SANITIZE_NUMBER_INT);
    }
}
?>

<?php include '../includes/header.php'; ?>
<h1>Formulario de registro</h1>

<!-- Formulario -->
<form action="b6_final_get.php" method="GET">
    Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre'] ?? '') ?>" required>
    <span style="color: red;" class="error"><?= htmlspecialchars($error['nombre']) ?></span><br>

    Apellidos: <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido'] ?? '') ?>" required>
    <span style="color: red;" class="error"><?= htmlspecialchars($error['apellido']) ?></span><br>

    Correo: <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo'] ?? '') ?>" required>
    <span style="color: red;" class="error"><?= htmlspecialchars($error['correo']) ?></span><br>

    Teléfono: <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono'] ?? '') ?>" required>
    <span style="color: red;" class="error"><?= htmlspecialchars($error['telefono']) ?></span><br>

    Tipo de evento:<br>
    Presencial <input type="radio" name="evento" value="presencial" <?= ($usuario['evento'] ?? '') === 'presencial' ? 'checked' : '' ?>>
    Online <input type="radio" name="evento" value="online" <?= ($usuario['evento'] ?? '') === 'online' ? 'checked' : '' ?>>
    <span style="color: red;" class="error"><?= htmlspecialchars($error['evento']) ?></span><br>

    Acepta términos y condiciones: <input type="checkbox" name="check" value="true" <?= $usuario['check'] ? 'checked' : '' ?> required>
    <span style="color: red;"><?= htmlspecialchars($error['check']) ?></span><br>

    <input type="submit" name="submitted" value="Enviar">
</form>

<!-- Mensajes -->
<?php if (!empty($sms)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($sms) ?></h3>
    </div>
<?php } ?>

<!-- Resultados -->
<?php if (isset($_GET['submitted']) && !$invalid) { ?>
    <h2>Resultados:</h2>
    <pre><?= var_dump($datos) ?></pre>
<?php } ?>

<?php include '../includes/footer.php'; ?>

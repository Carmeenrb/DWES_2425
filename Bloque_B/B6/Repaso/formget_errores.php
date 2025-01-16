<!-- Formulario manual get -->
<?php
// Inicializamos variables o array
// Array 
$usuario = [

    'nombre' => '',
    'apellido' => '',
    'direccion' => '',
    'edad' => '',
    'posicion' => '',
    'email' => '',
    'tlf' => '',
    'registrar' => false
];
// Verificar que el formulario fue enviado 
$submitted = isset($_GET['submitted']);
// cogemos los datos
// Validacion
if ($submitted) {
    $usuario['nombre'] = htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8');
    $usuario['apellido'] = htmlspecialchars($_GET['apellido'], ENT_QUOTES, 'UTF-8');
    $usuario['direccion'] = htmlspecialchars($_GET['direccion'], ENT_QUOTES, 'UTF-8');
    $usuario['edad'] = htmlspecialchars($_GET['edad'], ENT_QUOTES, 'UTF-8');
    $usuario['posicion'] = htmlspecialchars($_GET['posicion'], ENT_QUOTES, 'UTF-8');
}

?>
<?php include '../includes/header.php'; ?>
<form action="fmanual_GET.php" method="GET">
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

</form>

<?php include '../includes/footer.php'; ?>
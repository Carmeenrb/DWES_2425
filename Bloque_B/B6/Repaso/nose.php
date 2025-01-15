<?php
// Inicialización de los datos y errores
$usuario = [
    'nombre' => '',
    'email' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];
$error = [
    'nombre' => '',
    'email' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];
$datos = [];
$mensaje = '';

// Validación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definir filtros para validación
    $filtros = [
        'nombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Za-z ]{2,50}$/'] // Solo letras y espacios, entre 2 y 50 caracteres
        ],
        'email' => FILTER_VALIDATE_EMAIL,  // Validación del email
        'telefono' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{9}$/'] // Solo números, exactamente 9 dígitos
        ],
        'evento' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^(Presencial|Online)$/'] // Solo las opciones "Presencial" u "Online"
        ],
        'terminos' => FILTER_VALIDATE_BOOLEAN // Validación del checkbox
    ];

    // Validar las entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Verifica si filter_input_array devolvió false o un valor inesperado
    if (!is_array($usuario)) {
        $usuario = [
            'nombre' => '',
            'email' => '',
            'telefono' => '',
            'evento' => '',
            'terminos' => '',
        ];
    }

    // Validar los errores
    $error['nombre'] = $usuario['nombre'] ? '' : 'El nombre completo es obligatorio y debe contener entre 2 y 50 caracteres.';
    $error['email'] = $usuario['email'] ? '' : 'El correo electrónico no es válido.';
    $error['telefono'] = $usuario['telefono'] ? '' : 'El teléfono debe ser un número válido con exactamente 9 dígitos.';
    $error['evento'] = $usuario['evento'] ? '' : 'Debe seleccionar un tipo de evento válido.';
    $error['terminos'] = $usuario['terminos'] === true ? '' : 'Debe aceptar los términos y condiciones.';

    // Saneamiento de los datos
    $datos = filter_var_array($usuario, [
        'nombre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'telefono' => FILTER_SANITIZE_NUMBER_INT,
        'evento' => FILTER_SANITIZE_STRING,
        'terminos' => FILTER_SANITIZE_NUMBER_INT
    ]);

    // Verifica si hay errores
    $invalid = implode('', $error);
    if ($invalid) {
        $mensaje = 'Por favor, corrige los errores.';
    } else {
        $mensaje = 'Se ha registrado correctamente :)';
    }
}
?>
<?php include '../includes/header.php'; ?>

<h1>Formulario de registro para eventos</h1>

<form action="juliaFinal.php" method="POST">
    <!-- Nombre completo -->
    Nombre completo: <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>">
    <span class="error"><?= $error['nombre'] ?></span><br>

    <!-- Correo electrónico -->
    Correo electrónico: <input type="text" name="email" value="<?= $usuario['email'] ?>">
    <span class="error"><?= $error['email'] ?></span><br>

    <!-- Teléfono -->
    Teléfono: <input type="text" name="telefono" value="<?= $usuario['telefono'] ?>">
    <span class="error"><?= $error['telefono'] ?></span><br>

    <!-- Tipo de evento -->
    Tipo de evento:
    <select name="evento">
        <option value="">Seleccione...</option>
        <option value="Presencial" <?= $usuario['evento'] == 'Presencial' ? 'selected' : '' ?>>Presencial</option>
        <option value="Online" <?= $usuario['evento'] == 'Online' ? 'selected' : '' ?>>Online</option>
    </select>
    <span class="error"><?= $error['evento'] ?></span><br>

    <!-- Aceptación de los términos -->
    <input type="checkbox" name="terminos" value="1" <?= $usuario['terminos'] == 1 ? 'checked' : '' ?>> Acepto los términos y condiciones.
    <span class="error"><?= $error['terminos'] ?></span><br>

    <input type="submit" value="Registrar">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($datos); ?></pre>
<?php } ?>

<?php if (!empty($mensaje)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($mensaje) ?></h3>
    </div>
<?php } ?>

<?php include '../includes/footer.php'; ?>
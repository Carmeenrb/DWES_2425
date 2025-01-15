<?php
declare(strict_types=1);

// Ejercicio 15. Validar multiples inputs (Pag. 235)

// Inicialización de los valores y errores
$form['email'] = '';
$form['age'] = '';
$form['url'] = '';
$form['terms'] = false;

$errors = [];
$message = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Filtros para validar los datos
    $filters['email'] = FILTER_VALIDATE_EMAIL;
    $filters['age']['filter']               = FILTER_VALIDATE_INT;    // Integer filter
    $filters['age']['options']['min_range'] = 16;                     // Min value 16
    $filters['age']['options']['max_range'] = 65;                     // Max value 65
    $filters['url'] = FILTER_VALIDATE_URL;

    // Captura los datos usando filter_input_array
    $form = filter_input_array(INPUT_POST, $filters);

    // Verificar errores de validación
    if (!$form['email']) {
        $errors['email'] = 'Por favor ingrese un correo electrónico válido.';
    }

    if (!$form['age']) {
        $errors['age'] = 'La edad debe estar entre 18 y 65 años.';
    }

    if (!$form['url']) {
        $errors['url'] = 'Por favor ingrese una URL válida.';
    }

    if (!$form['terms']) {
        $errors['terms'] = 'Debe aceptar los términos y condiciones.';
    }

    // Si no hay errores, mostrar mensaje de éxito
    if (empty($errors)) {
        $message = 'Formulario enviado correctamente!';
    }
}

?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Mostrar el formulario -->
<form action="index.php" method="POST">
    <!-- Email -->
    E-mail: <input type="text" name="email" value="<?= htmlspecialchars($form['email'] ?? '') ?>">
    <span class="error"><?= $errors['email'] ?? '' ?></span><br>

    <!-- Edad -->
    Edad: <input type="text" name="age" value="<?= htmlspecialchars($form['age'] ?? '') ?>">
    <span class="error"><?= $errors['age'] ?? '' ?></span><br>

    <!-- URL -->
    URL: <input type="text" name="url" value="<?= htmlspecialchars($form['url'] ?? '') ?>">
    <span class="error"><?= $errors['url'] ?? '' ?></span><br>

    <!-- Términos y condiciones -->
    I agree to the terms and conditions: <input type="checkbox" name="terms" value="1">
    <span class="error"><?= $errors['terms'] ?? '' ?></span><br>

    <input type="submit" value="Save">
</form>

<p><?= $message ?></p>

<?php include '../includes/footer.php'; ?>

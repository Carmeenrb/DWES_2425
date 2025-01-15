<!-- pagina 263-->
<?php
// Creamos los arrays
$usuario = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
];
$error = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
];
$datos = [];

// Validacion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filtros['nombre']['filter'] = FILTER_VALIDATE_REGEXP; // o el filter sanitare string
    $filtros['nombre']['options']['regexp'] = '/[A-z]{3,}/';
    $filtros['edad']['filter'] = FILTER_VALIDATE_INT;
    $filtros['edad']['options']['min_range'] = 18;
    $filtros['edad']['options']['max_range'] = 65;
    $filtros['correo'] = FILTER_VALIDATE_EMAIL;
    $filtros['telefono']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['telefono']['options']['regexp'] = '/[0-9]{9}/';
    $filtros['sms']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['sms']['options']['regexp'] = '/[A-z]{1,50}/';


    // Validar entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    $datos=filter_var_array($usuario,$filtros);


    // Validar los errores
    $error['nombre'] = $usuario['nombre'] ? '' : 'Debe de escribir un nombre';
    $error['edad'] = $usuario['edad'] ? '' : 'La edad debe estar entre 18 y 65 años';
    $error['correo'] = $usuario['correo'] ? '' : 'El correo no es valido';
    $error['telefono'] = $usuario['telefono'] ? '' : 'El telefono no es correcto';
    $error['sms'] = $usuario['sms'] ? '' : 'Debe de tener al menos 3 caracteres';

    // Si hay errores
    $invalid = implode($error);
    if ($invalid) {
        $sms = 'Por favor, corrige los errores';

    } else {
        $sms = 'Gracias!, los datos son correctos';
        // Aqui se mandaria a la base de datos 
    }

    // Aplicar los filtros de saneamiento 
    $datos['nombre'] = filter_var($datos['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $datos['edad'] = filter_var($datos['edad'], FILTER_SANITIZE_NUMBER_INT);
    $datos['correo'] = filter_var($datos['correo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $datos['telefono'] = filter_var($datos['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $datos['sms'] = filter_var($datos['sms'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    // Otra manera de hacerlo
    // $filters=[
    //     'nombre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    //     'edad' => FILTER_SANITIZE_NUMBER_INT,
    //     'correo' => FILTER_SANITIZE_EMAIL,
    //     'telefono' => FILTER_SANITIZE_NUMBER_INT,
    //     'sms' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,

    // ];
    // $datos = filter_var_array($datos,$filters);
}
?>
<?php include '../includes/header.php' ?>
<h1>Formulario de contacto</h1>
<form action="b6.17.php" method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>">
    <span style="color: red;" class="error"><?= $error['nombre'] ?></span><br>

    Edad: <input type="text" name="edad" value="<?= $usuario['edad'] ?>">
    <span style="color: red;" class="error"><?= $error['edad'] ?></span><br>

    Correo: <input type="text" name="correo" value="<?= $usuario['correo'] ?>">
    <span style="color: red;" class="error"><?= $error['correo'] ?></span><br>

    Telefono: <input type="text" name="telefono" value="<?= $usuario['telefono'] ?>">
    <span style="color: red;" class="error"><?= $error['telefono'] ?></span><br>

    Mensaje: <input type="text" name="sms" value="<?= $usuario['sms'] ?>">
    <span style="color: red;" class="error"><?= $error['sms'] ?></span><br>

    <input type="submit" value="Save">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($datos); ?></pre>
<?php } ?>

<?php if (!empty($sms)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($sms) ?></h3>
    </div>
<?php } ?>

<?php include '../includes/footer.php' ?>
<!-- pagina 274 -->
<?php
// Creamos los arrays
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
$datos = [

    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'check' => '',
];

// Validacion 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filters['nombre']['filter'] = FILTER_VALIDATE_REGEXP; // o el filter sanitare string
    $filters['nombre']['options']['regexp'] = '/[A-z]{2,50}/';
    $filters['apellido']['filter'] = FILTER_VALIDATE_REGEXP; // o el filter sanitare string
    $filters['apellido']['options']['regexp'] = '/[A-z]{2,50}/';
    $filters['correo'] = FILTER_VALIDATE_EMAIL;
    $filters['telefono']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['telefono']['options']['regexp'] = '/[0-9]{9}/';
    $filters['evento']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['evento']['options']['regexp'] = '/(presencial|online)/';
    $filters['check']['filter'] = FILTER_VALIDATE_BOOLEAN;
    $filters['check']['flags'] = FILTER_NULL_ON_FAILURE;

    
    // Recoge los datos del formulario sobreescribiendo el arrau usuario y valida los datos con los filtros 
    $usuario = filter_input_array(INPUT_POST, $filters);

    // Valida los datos del formulario
    // $datos = filter_var_array($usuario, $filters);

    // Validar errores
    $error['nombre'] = $usuario['nombre'] ? '' : 'Debe de escribir un nombre';
    $error['apellido'] = $usuario['apellido'] ? '' : 'Debe de escribir los apellidos';
    $error['correo'] = $usuario['correo'] ? '' : 'El correo no es valido';
    $error['telefono'] = $usuario['telefono'] ? '' : 'El telefono no es correcto';
    $error['evento'] = $usuario['evento'] ? '' : 'Debe de seleccionar un evento';
    $error['check'] = $usuario['check'] ? '' : 'Debe de aceptar las condiciones de uso';

    // Si hay errores
    $invalid = implode($error);
    if ($invalid) {
        $sms = 'Por favor, corrige los errores';

    } else {
        $sms = 'Gracias!, los datos son correctos';
    }

    // Realizar saneamiento 
    $datos['nombre'] = filter_var($usuario['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $datos['apellido'] = filter_var($usuario['apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $datos['correo'] = filter_var($usuario['correo'], FILTER_SANITIZE_EMAIL);
    $datos['telefono'] = filter_var($usuario['telefono'], FILTER_SANITIZE_NUMBER_INT);

}
;
?>
<?php include '../includes/header.php' ?>
<!-- Formulario -->
<h1>Formulario de registro</h1>
<form action="b6_final.php" method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $datos['nombre'] ?>" require>
    <span style="color: red;" class="error"><?= $error['nombre'] ?></span><br>

    Apellidos: <input type="text" name="apellido" value="<?= $datos['apellido'] ?>" require>
    <span style="color: red;" class="error"><?= $error['apellido'] ?></span><br>

    Correo: <input type="text" name="correo" value="<?= $datos['correo'] ?>" require>
    <span style="color: red;" class="error"><?= $error['correo'] ?></span><br>

    Telefono: <input type="text" name="telefono" value="<?= $datos['telefono'] ?>" require>
    <span style="color: red;" class="error"><?= $error['telefono'] ?></span><br>

    Tipo de evento: <br>
    Presencial <input type="radio" name="evento" value="presencial"<?= $datos['evento'] === 'presencial' ? 'checked' : '' ?>>
    Online <input type="radio" name="evento" value="online" <?= $datos['evento'] === 'online' ? 'checked' : '' ?>>
    <span style="color: red;" class="error"><?= $error['evento'] ?></span><br>
    

    Acepta terminos y condiciones <input type="checkbox" name="check" value="true" require>
    <span style="color: red;"> <?= $error['check'] ?> </span><br>

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
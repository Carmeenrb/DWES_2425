<?php 
// Array
$usuario=[
    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'edad' => '',
    'contrasenia' => '',
    'check' => ''
];
$datos=[
    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'edad' => '',
    'contrasenia' => '',
    'check' => '',
];
$error=[
    'nombre' => '',
    'apellido' => '',
    'correo' => '',
    'edad' => '',
    'contrasenia' => '',
    'check' => ''
];
// Verificar que el formulario fue enviado 
$submitted = $_GET['sent'] ?? '';
if ($submitted === 'enviar'){
    // Validar los datos
    $usuario['nombre']= $_GET['nombre'];
    $usuario['apellido'] = $_GET['apellido'];
    $usuario['correo'] = $_GET['correo'];
    $usuario['edad'] = $_GET['edad'];
    $usuario['contrasenia'] = $_GET['contrasenia'];
    $usuario['check'] = isset($_GET['check']);

    $usuario = filter_input_array(INPUT_GET);

    // Errores
    $error['nombre']= validarTxt($usuario['nombre'],2,20) ? '' : 'El nombre debe de estar relleno';
    $error['apellido']= validarTxt($usuario['apellido'],2,50) ? '' : 'El apellido debe de estar relleno';
    $error['correo']= validarCorreo($usuario['correo']) ? '' : 'El correo es incorrecto';
    $error['edad']= validarEdad($usuario['edad'],16,50) ? '' : 'La edad debe de estar entre 16 y 50';
    $error['contrasenia']= validarContra($usuario['contrasenia']) ? '' : 'La contraseña al menos debe de tener 8 caracteres';
    $error['check'] = $usuario['check'] ? '' : 'Debe de aceptar los terminos y condiciones';

    $invalid = !empty(array_filter($error));

    if ($invalid) {
        $sms = 'Por favor corrige los errores';

    } else {
        $sms = '¡Formulario válido! Gracias por aceptar los términos y condiciones.';
    }

    // Saneamiento
    $datos['nombre'] = htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8');
    $datos['apellido'] = htmlspecialchars($usuario['apellido'], ENT_QUOTES, 'UTF-8');
    $datos['correo'] = htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8');
    $datos['edad'] = htmlspecialchars($usuario['edad'], ENT_QUOTES, 'UTF-8');
    $datos['contrasenia'] = htmlspecialchars($usuario['contrasenia'], ENT_QUOTES, 'UTF-8');
    $datos['check'] = isset($usuario['check']);

}
// FUNCIONES
    function validarTxt($dato,$min=0,$max=50){
    return strlen($dato) >= $min && strlen($dato) <=$max;
    }
    function validarCorreo($correo){
        if(preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $correo)){
            return true;
        }
            return false;
    }
    function validarEdad($edad,$min=18, $max=50){
        return $edad >= $min && $edad <= $max;
    }
    function validarContra($contrasenia){
        if(
            mb_strlen($contrasenia) >=8
            && preg_match('/[A-z]/', $contrasenia) 
            && preg_match('/[0-9]/', $contrasenia))
        {
            return true;
        }
            return false;
    }

?>
<?php include '../includes/header.php' ?>
<h1>Formulario de Registro</h1>

<form action="formManual_GET.php" method="GET">
    Nombre: <input type="text" name="nombre" value="<?= $datos['nombre'] ?>">
    <span class="error"><?= $error['nombre'] ?></span><br>

    Apellidos: <input type="text" name="apellido" value="<?= $datos['apellido'] ?>">
    <span class="error"><?= $error['apellido'] ?></span><br>

    Correo: <input type="text" name="correo" value="<?= $datos['correo'] ?>">
    <span class="error"><?= $error['correo'] ?></span><br>

    Edad: <input type="text" name="edad" value="<?= $datos['edad'] ?>">
    <span class="error"><?= $error['edad'] ?></span><br>

    Contraseña: <input type="text" name="contrasenia" value="<?= $datos['contrasenia'] ?>">
    <span class="error"><?= $error['contrasenia'] ?></span><br>

    <!-- Confirmacion de consentimiento -->
    Aceptar las condiciones <input type="checkbox" name="check" value="true"<?= $datos['check'] ? 'checked' : '' ?>>
    <span class="error"><?= $error['check'] ?></span><br>

    <input type="submit" name='sent' value="enviar">
</form>
<!-- Mostrar los datos -->
<?php if ($submitted === 'enviar') { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($datos); ?></pre>
<?php } ?>

<!-- Si existe algun error -->
<?php if (!empty($sms)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($sms) ?></h3>
    </div>
<?php } ?>
<?php include '../includes/footer.php' ?>
<!-- pagina 244 -->
<?php 
$formulario = [
    'email' => '',
    'edad' => '',
    'url' => '',
    'check' => '',
];
$error = [
    'email' => '',
    'edad' => '',
    'url' => '',
    'check' => '',
];
$datos=[];

if($_SERVER['REQUEST_METHOD']== 'POST'){
    // Definir filtros
    $filters['email'] = FILTER_VALIDATE_EMAIL;
    $filters['edad']['filter'] = FILTER_VALIDATE_INT;
    $filters['edad']['options']['min_range'] = 18;
    $filters['edad']['options']['max_range'] = 65;
    $filters['url'] = FILTER_VALIDATE_URL;
    $filters['check']['filter'] = FILTER_VALIDATE_BOOLEAN;
    $filters['check']['flags'] = FILTER_NULL_ON_FAILURE;

    // Obtener los valores enviados mediante post
    $formulario = filter_input_array(INPUT_POST);

    // validar los datos con los filtros 
    $datos['email'] = filter_var($datos['email'], FILTER_SANITIZE_EMAIL);
    $datos['edad'] = filter_var($datos['edad'], FILTER_SANITIZE_NUMBER_INT);
    $datos['url'] = filter_var($datos['url'], FILTER_SANITIZE_URL);
    
    

    // Validar entradas
    // $formulario = filter_input_array(INPUT_POST, $filters);

    // Validar errores
    $error['email'] = $formulario['email'] ? '' : 'El correo electrónico no es válido';
    $error['edad'] = $formulario['edad'] ? '' : 'La edad debe estar entre 18 y 65 años';
    $error['url'] = $formulario['url'] ? '' : 'La URL no es válida';
    $error['check'] = $formulario['check'] ? '' : 'Debe aceptar los términos y condiciones';

}
?>

<?php include '../includes/header.php' ?>

<form action="b6.16.php" method="POST">
    Email: <input type="text" name="email" value="<?= htmlspecialchars($formulario['email'])?>">
    <span style="color: red;" class="error"><?= $error['email'] ?></span><br>

    edad: <input type="text" name="edad" value="<?= htmlspecialchars($formulario['edad'])?>">
    <span style="color: red;" class="error"><?= $error['edad'] ?></span><br>

    URL: <input type="text" name="url" value="<?= htmlspecialchars($formulario['url']) ?>">
    <span style="color: red;" class="error"><?= $error['url'] ?></span><br>

    Acepta terminos y condiciones <input type="checkbox" name="check" value="true">
    <span style="color: red;"> <?= htmlspecialchars($error['check']) ?> </span><br>

    <input type="submit" value="Save">
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($datos);?></pre>
<?php } ?>

<?php include '../includes/footer.php' ?>
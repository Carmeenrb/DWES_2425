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
if ($submitted) {
    $usuario['nombre'] = htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8');
    $usuario['apellido'] = htmlspecialchars($_GET['apellido'], ENT_QUOTES, 'UTF-8');
    $usuario['direccion'] = htmlspecialchars($_GET['direccion'], ENT_QUOTES, 'UTF-8');
    $usuario['edad'] = htmlspecialchars($_GET['edad'], ENT_QUOTES, 'UTF-8');
    $usuario['posicion'] = htmlspecialchars($_GET['posicion'], ENT_QUOTES, 'UTF-8');
}

?>
<?php include '../includes/header.php'; ?>

<?php include '../includes/footer.php'; ?>